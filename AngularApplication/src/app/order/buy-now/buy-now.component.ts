import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { OrderService } from '../../services/order.service';
import { IAddress } from 'src/app/models/address';
import { IProduct } from 'src/app/models/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-buy-now',
  templateUrl: './buy-now.component.html',
  styleUrls: ['./buy-now.component.css']
})
export class BuyNowComponent implements OnInit {
  isAddressPanelHidden: boolean = false;
  selectedAddress: IAddress;
  isAddressSelected: boolean = false;
  product: IProduct;
  orderplaced: boolean = false;
  orderId: any;


  constructor(private orderService: OrderService, private route: ActivatedRoute, private productService: ProductService) { }

  ngOnInit() {
    this.productService.getById(this.route.snapshot.params['id']).subscribe(data => {
      this.product = data;
    })
  }


  toggleAdressPanel() {
    this.isAddressPanelHidden = !this.isAddressPanelHidden;
  }

  setSelectedAddress(address) {
    // console.log("at cart",address)
    this.selectedAddress = address;
    this.isAddressSelected = true;
  }


  BuyNow() {
    this.orderService.buyNow({'product_id': this.product.id, 'address_id': this.selectedAddress.id}).subscribe(data => {
      this.orderId = data;
      this.orderplaced = true;
    })
  }


}
