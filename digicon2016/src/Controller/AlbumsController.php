<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Albums Controller
 *
 * @property \App\Model\Table\AlbumsTable $Albums
 */
class AlbumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $albums = $this->Albums->find('all', [
            'conditions' => [
                'user_id' => $this->Auth->user('id'),
            ],
        ]);

        $this->set(compact('albums'));
    }

    /**
     * View method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $album = $this->Albums->get($id, [
            'contain' => ['Users', 'AlbumPhotos']
        ]);

        $this->set('album', $album);
        $this->set('_serialize', ['album']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $album = $this->Albums->newEntity();
        if ($this->request->is('post')) {
            $album = $this->Albums->patchEntity($album, $this->request->data);
            if ($this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The album could not be saved. Please, try again.'));
            }
        }
        $users = $this->Albums->Users->find('list', ['limit' => 200]);
        $this->set(compact('album', 'users'));
        $this->set('_serialize', ['album']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $album = null;
        $albums = $this->Albums->find('all', [
            'conditions' => [
                'user_id' => $this->Auth->user('id'),
            ],
        ]);
        $albums_select = [];
        foreach ($albums as $album) {
            $albums_select[$album->id] = $album->name;
        }

        if ($this->request->is(['post'])) {
            if (!empty($this->request->data('id'))) {
                if (!in_array($this->request->data('id'), array_keys($albums_select))) {
                    $this->Flash->error(__('The album id could not be edited.'));
                    return $this->redirect(['action' => 'index']);
                }
                $album = $this->Albums->get($this->request->data('id'));
            } else {
                $album = $this->Albums->newEntity();
                $album->set('user_id', $this->Auth->user('id'));
            }

            $album = $this->Albums->patchEntity($album, $this->request->data, ['associated' => 'AlbumPhotos']);
            if ($result = $this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'view', $result->id]);
            } else {
                $this->Flash->error(__('The album could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('album', 'albums', 'albums_select'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $album = $this->Albums->get($id);
        if ($this->Albums->delete($album)) {
            $this->Flash->success(__('The album has been deleted.'));
        } else {
            $this->Flash->error(__('The album could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
