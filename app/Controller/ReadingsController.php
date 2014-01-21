<?php
App::uses('AppController', 'Controller');

/**
 * Readings Controller
 *
 * @property Reading $Reading
 * @property PaginatorComponent $Paginator
 */
class ReadingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

	public $paginate = array(
		'limit' => 100,
		'order' => array(
			'Reading.YearMonthDay' => 'desc'
		)
	);

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js' => array('Jquery'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reading->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('readings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reading->exists($id)) {
			throw new NotFoundException(__('Invalid reading'));
		}
		$options = array('conditions' => array('Reading.' . $this->Reading->primaryKey => $id));
		$this->set('reading', $this->Reading->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reading->create();
			if ($this->Reading->save($this->request->data)) {
				//$this->Session->setFlash(__('The reading has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The reading could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reading->exists($id)) {
			throw new NotFoundException(__('Invalid reading'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reading->save($this->request->data)) {
				$this->Session->setFlash(__('The reading has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reading could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reading.' . $this->Reading->primaryKey => $id));
			$this->request->data = $this->Reading->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reading->id = $id;
		if (!$this->Reading->exists()) {
			throw new NotFoundException(__('Invalid reading'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reading->delete()) {
			$this->Session->setFlash(__('The reading has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reading could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * refresh method
 * If I had more time, much of this function should be moved 
 * into a plugin or component, and the data fetched should be 
 * stored in the DB instead of being sent straight to the view
 * so that it works with pagination.
 *
 * Fetches daily weather data from Quality NOAA's Controlled Local Climatological Data site
 * Station Name: SAN FRANCISCO INTERNATIONAL AIRPORT, CA US
 * Station ID:	 GHCND:USW00023234 
 * @return json
 */
    public function refresh() {
    	$token = '';
    	$url   = 'http://www.ncdc.noaa.gov/cdo-web/api/v2/data';

    	App::uses('HttpSocket', 'Network/Http');
    	$HttpSocket = new HttpSocket();

    	// token must be set in the headers
        $options = array(
			'header' => array(
			    'token' => $token
			)
		);
    	// send the request
    	$response = $HttpSocket->get($url, array('datasetid' => 'GHCND',
    		                                    'stationid' => 'GHCND:USW00023234',
    		                                    'startdate' => '2014-01-01',
    		                                    'enddate'   => date("Y-m-d"),
    		                                    'offset'    => 0,
    		                                    'limit'     => 1000), $options);

    	if( $response->isOk() ) {
    		
    		$dataIN = json_decode( $response->body(), true );
			$my_arr = array();

			// pull out only the data we want, combined with date as the key
			foreach ($dataIN['results'] as $data) {
			  foreach ($data as $key => $value) {
			    if($key === "datatype" && $value === "TMIN" || $value === "TMAX") {
			      $my_arr[$data['date']][$value] = $data['value']; 
			    }
			    
			  }
			}
			// sort by date descending
			krsort($my_arr);

    		// send data back to the view
    		$this->set(array(
                'data' => $my_arr,
    			'_serialize', array('data')));
    		
            // clean up
    		unset($dataIN);
    		unset($my_arr);

    	} else {
    		echo json_encode( array('error' => $response->reasonPhrase(),
    			                    'code'  => $response->code()) );
    	}
    }

}
