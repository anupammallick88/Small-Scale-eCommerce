import { Component, OnInit } from '@angular/core';
import { IProduct } from '../../models/product';
import { ProductService } from '../../services/product.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-product-show',
  templateUrl: './product-show.component.html',
  styleUrls: ['./product-show.component.css']
})
export class ProductShowComponent implements OnInit {
  product: IProduct;
  id: number;
  addedToCart: boolean = false;

    constructor(private productService: ProductService, private route: ActivatedRoute) {
      this.id = this.route.snapshot.params['id'];
    }

    ngOnInit() {
        this.productService.getById(this.id).subscribe(data => {
            this.product = data;
        });
    }

    addToCart() {
      console.log('clicked! ' + this.id);
      this.productService.addToCart(this.id).subscribe(data => {
        this.addedToCart = true;
      });
    }

}
