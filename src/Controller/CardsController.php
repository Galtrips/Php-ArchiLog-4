<?php

declare(strict_types=1);

namespace App\Controller;
//use Intervention\Image\ImageManager;
use Cake\View\JsonView;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cards = $this->Cards->find()->all();

        $this->set(compact('cards'));

        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $card = $this->Cards->get($id);

        $this->set(compact('card'));
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function create()
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));

        if (!$this->Authentication->getIdentity()->admin) {
            $this->Flash->error(__('Vous n\'êtes pas autorisé à faire cela.'));
            return $this->redirect(['action' => 'index']);
        }
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $attachment = $this->request->getData('image');

            $card = $this->Cards->patchEntity($card, $data);
            $card->image = "NONE";
            $card->user_id = $this->Authentication->getIdentity()->id;

            if ($this->Cards->save($card)) {

                $idCard = $card->id;

                if (!$card->getErrors() && isset($attachment)) {

                    $name = $attachment['name'];

                    $path = WWW_ROOT . 'img' . DS . 'cards' . DS . $idCard . '.png';
                    if ($name) {
                        //$manager = new ImageManager(['driver' => 'imagick']);
                        //$image = $manager->make($attachment['tmp_name'])->resize(300, 200);
                        //$image->save($path, 60);
                        move_uploaded_file($attachment['tmp_name'], $path);
                    }

                    $card->image = '/img/cards/' . $idCard . '.png';
                } else {
                    $this->Flash->error(__('La carte n\'a pas pu être sauvegardée. Veuillez réessayer.'));
                    $this->Cards->delete($card);
                }

                if ($this->Cards->save($card)) {
                    $this->Flash->success(__('La carte a été sauvegardée.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('La carte n\'a pas pu être sauvegardée. Veuillez réessayer.'));
        }
        $this->set(compact('card'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));

        if (!$this->Authentication->getIdentity()->admin) {
            $this->Flash->error(__('Vous n\'êtes pas autorisé à faire cela.'));
            return $this->redirect(['action' => 'index']);
        }
        $card = $this->Cards->get($id);
        if ($this->request->is('post')) {

            $data = $this->request->getData();


            $card = $this->Cards->patchEntity($card, $data);
            $card->user_id = $this->Authentication->getIdentity()->id;

            if ($this->Cards->save($card)) {

                $this->Flash->success(__('La carte a bien été modifiée.'));
                return $this->redirect(['action' => 'view', $card->id]);
            
            }
            $this->Flash->error(__('La carte n\'a pas pu être modifiée. Veuillez réessayer.'));
        }
        $this->set(compact('card'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        if (!$this->Authentication->getIdentity()->admin) {
            $this->Flash->error(__('Vous n\'êtes pas autorisé à faire cela.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            unlink(WWW_ROOT . 'img' . DS . 'cards' . DS . $id . '.png');
            $this->Flash->success('La care a bien été supprimé');
        } else {
            $this->Flash->error('La carte n\'a pas pu être supprimé');
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Personnal view method for administrator only
     *
     *     
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewperso()
    {
        if (!$this->Authentication->getIdentity()->admin) {
            $this->Flash->error(__('Vous n\'êtes pas autorisé à faire cela.'));
            return $this->redirect(['action' => 'index']);
        }
        $cards = $this->Cards->find()->where(['user_id' => $this->Authentication->getIdentity()->id])->all();
        $this->set(compact('cards'));
        
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));
    }

    /**
     * Add to cart method to choose cards to buy
     *
     * @param [type] $id
     * @return void
     * @throws \Cake\Http\Exception\NotFoundException When record not found.
     */
    public function addtocart ($id)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        foreach ($cart as $content) {
            if ($content->id == $id) {
                $this->Flash->error(__('La carte ' . $content->name .' est déjà dans votre panier.'));
                return $this->redirect($this->referer());
            }
        }

        $card = $this->Cards->get($id);
        $session->write('cart', array_merge($cart, [$card]));
        $this->Flash->success(__('La carte ' . $card->name . ' a bien été ajoutée à votre panier.'));
        return $this->redirect($this->referer());
    }

    /**
     * Remove from cart method to remove cards from cart
     * 
     * @param [type] $id
     * @return void
     * @throws \Cake\Http\Exception\NotFoundException When record not found.
     */
    public function removefromcart ($id)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        foreach ($cart as $key => $content) {
            if ($content->id == $id) {
                unset($cart[$key]);
                $session->write('cart', $cart);
                $this->Flash->success(__('La carte ' . $content->name . ' a bien été supprimée de votre panier.'));
                return $this->redirect($this->referer());
            }
        }

        $this->Flash->error(__('la carte n\'est pas dans votre panier.'));
        return $this->redirect($this->referer());
    }

    /**
     * Before filter method to allow unauthenticated users to access to some actions
     *
     * @param \Cake\Event\EventInterface $event
     * @return void
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(
            [
                'index', 
                'removefromcart', 
                'addtocart', 
                'view', 
                'getPokemons',
                'getPokemonsByType', 
                'getPokemonsByRarity',
                'getPokemonsByPrice',
                'getPokemonsByQuantity',
                'getPokemonsByUser',
                'getPokemon'
            ]
        );
    }

    /**
     * Get all pokemons by type from database and return them in json format
     * 
     * @param [type] $type
     * @return void
     */
    public function getPokemonsByType($type)
    {

        $datas = $this->Cards->find()->where(['type' => $type])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * Get all pokemons by rarity from database and return them in json format
     *
     * @param [type] $rarity
     * @return void
     */
    public function getPokemonsByRarity($rarity)
    {

        $datas = $this->Cards->find()->where(['rarity' => $rarity])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * Get all pokemons by price from database and return them in json format
     * 
     * @return void
     */
    public function getPokemonsByPrice()
    {

        $datas = $this->Cards->find()->order(['price' => 'DESC'])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * Get all pokemons by quantity from database and return them in json format
     *
     * @return void
     */
    public function getPokemonsByQuantity () {

        $datas = $this->Cards->find()->order(['quantity' => 'DESC'])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     *  Get all pokemons from database and return them in json format
     *
     * @return void
     */
    public function getPokemons()
    {

        $datas = $this->Cards->find()->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * Get a pokemon by id from database and return it in json format
     *
     * @param [type] $id
     * @return void
     */
    public function getPokemon($id)
    {

        $datas = $this->Cards->find()->where(['id' => $id])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     *  Get all pokemons by user from database and return them in json format
     *
     * @return void
     */
    public function getPokemonsByUser($user_id)
    {

        $datas = $this->Cards->find()->where(['user_id' => $user_id])->all();
  
        $this->set(['cards' => $datas]);
        $this->viewBuilder()
            ->setOption('serialize', 'cards')
            ->setOption('jsonOptions', JSON_FORCE_OBJECT);

        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * View classes to use for this controller.
     *
     * @return array
     */
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
}
