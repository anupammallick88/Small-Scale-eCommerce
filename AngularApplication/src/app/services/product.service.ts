import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IProduct } from '../models/product';
import { ApiService } from './api.service';

@Injectable()
export class ProductService {

    constructor(private api: ApiService) { }




    getAll(): Observable<IProduct[]> {
      return this.api.get<IProduct[]>('/products', 'getAll');
    }

    getById(id): Observable<IProduct> {
      return this.api.get<IProduct>('/products/' + id, 'getById');
    }

    getByCategory(id): Observable<IProduct[]> {
      return this.api.get<IProduct[]>('/categories/' + id, 'getByCategory');
    }

    addToCart(product_id) {
      return this.api.post('/carts/' + product_id, {}, 'addToCart');
    }


}
