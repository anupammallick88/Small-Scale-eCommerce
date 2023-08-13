import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IAddress } from 'src/app/models/address';

@Component({
  selector: 'app-address-list',
  templateUrl: './address-list.component.html',
  styleUrls: ['./address-list.component.css']
})
export class AddressListComponent implements OnInit {
  @Input() address: IAddress;
  @Output() getSelectedAddress = new EventEmitter;
  constructor() {
  }

  ngOnInit() {

  }

  setToCart(){
    this.getSelectedAddress.emit(this.address);
  }

}
