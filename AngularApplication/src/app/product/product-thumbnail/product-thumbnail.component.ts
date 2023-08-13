import { Component, OnInit, Input } from '@angular/core';
import { IProduct } from '../../models/product';
import { ProductService } from '../../services/product.service';

@Component({
  selector: 'app-product-thumbnail',
  templateUrl: './product-thumbnail.component.html',
  styleUrls: ['./product-thumbnail.component.css']
})
export class ProductThumbnailComponent implements OnInit {
  @Input() product: IProduct;
  addedToCart: boolean = false;

  constructor(private productService: ProductService) { }

  ngOnInit() {
  }


  addToCart() {
    this.productService.addToCart(this.product.id).subscribe( () => {
      // console.log(data)
      this.addedToCart = true;
    });
  }

}
