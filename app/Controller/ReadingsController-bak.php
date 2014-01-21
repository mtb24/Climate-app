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
				$this->Session->setFlash(__('The reading has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reading could not be saved. Please, try again.'));
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
 * fetchData method
 *
 * Fetches daily weather data from Quality NOAA's Controlled Local Climatological Data site
 * Station Name: SAN FRANCISCO INTERNATIONAL AIRPORT, CA US
 * Station ID:	 GHCND:USW00023234 
 * @return json
 */
    protected function fetchData() {
    	$token = 'ocjQhgorjZophCNgLLljABZUscFULJFh';
    	$url   = 'http://www.ncdc.noaa.gov/cdo-web/api/v2/data';

    	App::uses('HttpSocket', 'Network/Http');
    	$HttpSocket = new HttpSocket();

    	// set token in the headers
        $options = array(
			'header' => array(
			    'token' => $token
			)
		);
    	// send the request
    	$response = $HttpSocket->get($url, array('datasetid' => 'GHCND',
    		                                    'stationid' => 'GHCND:USW00023234',
    		                                    'startdate' => '2014-01-01',
    		                                    'enddate'   => '2014-01-17',
    		                                    'offset'    => 0,
    		                                    'limit'     => 1000), $options);

    	if( $response->isOk() ) {
    		
    		$dataIN = json_decode( $response->body(), true );
			$my_arr = array();
			foreach ($dataIN['results'] as $data) {
			  foreach ($data as $key => $value) {
			    if($key === "datatype" && $value === "TMIN" || $value === "TMAX") {
			      $my_arr[$data['date']][$value] = $data['value']; 
			    }
			    
			  }
			}
    		
    		// save data to DB
			if ($this->Reading->save($my_arr)) {
				$this->Session->setFlash(__('The reading has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reading could not be saved. Please, try again.'));
			}

            // clean up
    		unset($dataIN);
    		unset($my_arr);

    		return true;
    	} else {
    		return false;
    	}
    }
/**
 * refresh method
 *
 * Fetches daily weather data from Quality NOAA's Controlled Local Climatological Data site
 * Station Name: SAN FRANCISCO INTERNATIONAL AIRPORT, CA US
 * Station ID:	 GHCND:USW00023234 
 * @return json
 */
    public function refresh() {
    	if( $this->fetchData ) {
    		
    		// send data to view
    		$this->set(array(
    			'data' => $this->Reading->find('all'),
    			'_serialize', array('data')));
    	}

    }

}
