import { Component, OnInit, Input } from '@angular/core';
import { ICartProduct } from 'src/app/models/cart';

@Component({
  selector: 'app-order-product-list',
  templateUrl: './order-product-list.component.html',
  styleUrls: ['./order-product-list.component.css']
})
export class OrderProductListComponent implements OnInit {
  @Input() product: ICartProduct;
  constructor() { }

  ngOnInit() {
  }

}
