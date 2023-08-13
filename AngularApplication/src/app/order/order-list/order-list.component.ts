import { Component, OnInit } from '@angular/core';
import { IOrder, IOrderDetails } from 'src/app/models/order';
import { OrderService } from 'src/app/services/order.service';

@Component({
  selector: 'app-order-list',
  templateUrl: './order-list.component.html',
  styleUrls: ['./order-list.component.css']
})
export class OrderListComponent implements OnInit {

  orders: IOrder[];
  orderDetail: IOrderDetails;
  selectedOrder: IOrder;
  isOrderSelected: boolean = false;

  constructor(private orderService: OrderService) { }

  ngOnInit() {

    this.orderService.getAll().subscribe(data => {
      this.orders = data;
    });
  }

  getorderDetailsById(order){
    this.isOrderSelected = true;
    this.selectedOrder = order;
    this.orderService.getDetailsById(order.id).subscribe(data => {
      this.orderDetail = data;
    });
  }

}
