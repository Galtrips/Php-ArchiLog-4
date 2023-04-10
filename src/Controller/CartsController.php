<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{


    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart');
        $cart = $cart ?? [];

        $this->set(compact('cart'));
    }







    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['view']);
    }
}
