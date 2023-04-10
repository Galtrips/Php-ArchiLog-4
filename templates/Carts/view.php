<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right mt-3"></i> Votre Panier</h3>
    <div class="row mt">
      <div class="col-md-12">
        <section class="task-panel tasks-widget">
          <div class="panel-heading">
            <div class="d-flex justify-content-between align-items-center mt-3">
              <h3><i class="fa fa-tasks"></i> Votre Panier</h3>
              <div class="btn-toolbar">

              </div>
            </div>
            <hr class="my-4">
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 order-md-2 mb-4" style="width: 50%;">

                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
                  <span class="badge badge-secondary badge-pill"><?=count($cart)?></span>
                </h4>
                <ul class="list-group mb-3">

                <?php
                $totalprice = 0;
                foreach ($cart as $item) {
                    echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
                    echo '<div style="display: flex; flex-direction: row; flex-wrap: wrap;">';
                    $innerHTML = '<img src="' . $item->image . '" class="card-img-top" alt="' . $item->name . '" style="width: 50px;">';
                    echo $this->Html->link($innerHTML, ['controller' => 'Cards', 'action' => 'view', $item->id], ['escapeTitle' => false]);
                    echo '<div style="display: block; margin-left: 10px;">';
                    echo '<h4 class="my-0">' . $item->name . '</h6>';
                    echo '<small class="text-muted me-3">' . $item->version . '    -    ' . $item->rarity .'</small>';
                    echo  '<br>';
                    echo '<small class="text-muted me-3">' . $item->type .'</small>';

                    echo '</div>';
                    echo '</div>';
                    echo '<div style="display: block;">';
                    echo '<span class="text-muted"  style="font-size:15px; margin-right: 15px;">' . $item->price . '€</span>';
                    echo $this->Html->link('<i class="bi bi-x-square" style="font-size:14px;"></i>', ['controller' => 'Cards', 'action' => 'removefromcart', $item->id], ['escapeTitle' => false, "class" => "btn btn-danger btn-sm pull-right", "style" => "height: 40%;"]);
                    echo '</div>';
                    $totalprice += $item->price;

                    echo '</li>';
                   

                }

                ?>       

                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong><?= $totalprice ?>€</strong>
                  </li>
                </ul>

                <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-8 order-md-1" style="width: 50%;">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" id="username" placeholder="Username" required>
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
                      <select class="custom-select d-block w-100" id="country" required>
                        <option value="">Choose...</option>
                        <option>United States</option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select class="custom-select d-block w-100" id="state" required>
                        <option value="">Choose...</option>
                        <option>California</option>
                      </select>
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zip" placeholder="" required>
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>
                  <hr class="mb-4">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                  </div>
                  <hr class="mb-4">

                  <h4 class="mb-3">Payment</h4>

                  <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                      <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                      <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cc-name">Name on card</label>
                      <input type="text" class="form-control" id="cc-name" placeholder="" required>
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="cc-number">Credit card number</label>
                      <input type="text" class="form-control" id="cc-number" placeholder="" required>
                      <div class="invalid-feedback">
                        Credit card number is required
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="cc-expiration">Expiration</label>
                      <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                      <div class="invalid-feedback">
                        Expiration date required
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="cc-cvv">CVV</label>
                      <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                      <div class="invalid-feedback">
                        Security code required
                      </div>
                    </div>
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
              </div>
            </div>
        </section>
      </div>
    </div>
  </section>

</section>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<script src="form-validation.js"></script>