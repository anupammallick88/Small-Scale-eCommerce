import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProduct } from 'src/app/models/product';
import { ProductService } from 'src/app/services/product.service';
import { ActivatedRoute } from '@angular/router';
import { ICartProduct } from 'src/app/models/cart';

@Component({
  selector: 'app-cart-product-list',
  templateUrl: './cart-product-list.component.html',
  styleUrls: ['./cart-product-list.component.css']
})
export class CartProductListComponent implements OnInit {

  @Input()  products: ICartProduct[];
  @Output() removeProduct = new EventEmitter();

  constructor() { }

  ngOnInit() { }

  remove(product_id) {

    this.removeProduct.emit(product_id);
  }
}
