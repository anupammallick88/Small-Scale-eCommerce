import { Injectable } from "@angular/core";
import { ICartProduct } from '../models/cart';
import { ApiService } from './api.service';

@Injectable()

export class CartService {
    constructor(private api: ApiService) {

    }

    getProducts() {

        return this.api.get<ICartProduct[]>('/carts', 'getCartProducts');
    }

    removeProduct(id) {

      return this.api.delete<ICartProduct>('/carts/' + id, 'removeProductFromCartById');
    }

}
