import { Component, OnInit } from '@angular/core';
import { ICartProduct } from 'src/app/models/cart';
import { IAddress } from 'src/app/models/address';
import { CartService } from 'src/app/services/cart.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cart-show',
  templateUrl: './cart-show.component.html',
  styleUrls: ['./cart-show.component.css']
})
export class CartShowComponent implements OnInit {

  products: ICartProduct[];
  total: number = 0;
  addressMode: string = 'select';
  isAddressPanelHidden: boolean = true;
  selectedAddress: IAddress;
  isAddressSelected: boolean = false;
  isCartEmpty: boolean = true;



  constructor(private cartService: CartService, private route: Router) { }

  ngOnInit() {

    this.cartService.getProducts().subscribe(data => {
      this.products = data;
      data.forEach(product => {
        this.total += product.cost * product.pivot.quantity;
      });
      if (data.length > 0) {
        this.isCartEmpty = false;
      }
    });
  }
  toggleAddressPanel() {

    this.isAddressPanelHidden = !this.isAddressPanelHidden;
  }

  remove(product_id) {

    this.cartService.removeProduct(product_id).subscribe(() => {
      this.total = 0;
      this.ngOnInit();
    });
  }

  setAddress(address) {

    this.selectedAddress = address;
    this.isAddressSelected = true;
  }

  placeOrder() {
    // this.cartService.placeOrder(this.selectedAddress.id).subscribe(order_id => {
    //   this.orderId = order_id;
    // })
    this.route.navigate(['/order-place', this.selectedAddress.id]);
  }

}
