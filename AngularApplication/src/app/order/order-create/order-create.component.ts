import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { OrderService } from 'src/app/services/order.service';

@Component({
  selector: 'app-order-create',
  templateUrl: './order-create.component.html',
  styleUrls: ['./order-create.component.css']
})
export class OrderCreateComponent implements OnInit {

  addressId: number;
  orderId: any;
  constructor(private route: ActivatedRoute, private orderService: OrderService) { }

  ngOnInit() {
    this.addressId = this.route.snapshot.params['id'];
    this.orderService.placeOrder(this.addressId).subscribe(order => {
      this.orderId = order['order_id'];
    });

  }
}
