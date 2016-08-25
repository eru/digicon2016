<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AlbumPhotos Controller
 *
 * @property \App\Model\Table\AlbumPhotosTable $AlbumPhotos
 */
class AlbumPhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Albums']
        ];
        $albumPhotos = $this->paginate($this->AlbumPhotos);

        $this->set(compact('albumPhotos'));
        $this->set('_serialize', ['albumPhotos']);
    }

    /**
     * View method
     *
     * @param string|null $id Album Photo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $albumPhoto = $this->AlbumPhotos->get($id, [
            'contain' => ['Albums']
        ]);

        $this->set('albumPhoto', $albumPhoto);
        $this->set('_serialize', ['albumPhoto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $albumPhoto = $this->AlbumPhotos->newEntity();
        if ($this->request->is('post')) {
            $albumPhoto = $this->AlbumPhotos->patchEntity($albumPhoto, $this->request->data);
            if ($this->AlbumPhotos->save($albumPhoto)) {
                $this->Flash->success(__('The album photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The album photo could not be saved. Please, try again.'));
            }
        }
        $albums = $this->AlbumPhotos->Albums->find('list', ['limit' => 200]);
        $this->set(compact('albumPhoto', 'albums'));
        $this->set('_serialize', ['albumPhoto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Album Photo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $albumPhoto = $this->AlbumPhotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $albumPhoto = $this->AlbumPhotos->patchEntity($albumPhoto, $this->request->data);
            if ($this->AlbumPhotos->save($albumPhoto)) {
                //$this->Flash->success(__('The album photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                //$this->Flash->error(__('The album photo could not be saved. Please, try again.'));
            }
        }
        $albums = $this->AlbumPhotos->Albums->find('list', ['limit' => 200]);
        $this->set(compact('albumPhoto', 'albums'));
        $this->set('_serialize', ['albumPhoto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Album Photo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albumPhoto = $this->AlbumPhotos->get($id);
        if ($this->AlbumPhotos->delete($albumPhoto)) {
            $this->Flash->success(__('The album photo has been deleted.'));
        } else {
            $this->Flash->error(__('The album photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
