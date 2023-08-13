import { Component, OnInit, Input } from '@angular/core';
import { ICartProduct } from 'src/app/models/cart';
import { IAddress } from 'src/app/models/address';

@Component({
  selector: 'app-order-show',
  templateUrl: './order-show.component.html',
  styleUrls: ['./order-show.component.css']
})
export class OrderShowComponent implements OnInit {
  @Input() products: ICartProduct;
  @Input() address: IAddress;
  @Input() orderId: number;
  @Input() total: number;

  constructor() { }

  ngOnInit() {
  }

}
