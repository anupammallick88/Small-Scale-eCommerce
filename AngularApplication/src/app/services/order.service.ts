import { Injectable } from "@angular/core";
import { IOrder, IOrderDetails } from '../models/order';
import { ApiService } from './api.service';
import { IProduct } from '../models/product';

@Injectable()

export class OrderService{

  constructor(private api: ApiService) { }


  getAll(){
    return this.api.get<IOrder[]>('/orders', 'getAllOrders');
  }

  getDetailsById(order_id: number) {
    return this.api.get<IOrderDetails>('/orders/' + order_id, 'getOrderDetailsById');
  }

  placeOrder(address_id) {
    return this.api.post<number>('/orders', {'address_id': address_id}, 'placeOrder');
  }


  buyNow(data){
    return this.api.post<number>('/orders/buy-now', data, 'buyNow');
  }

}
