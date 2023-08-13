import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { UserService } from 'src/app/services/user.service';
import { IAddress } from 'src/app/models/address';

@Component({
  selector: 'app-address-home',
  templateUrl: './address-home.component.html',
  styleUrls: ['./address-home.component.css']
})
export class AddressHomeComponent implements OnInit {

  addressMode: string = 'create';
  address: IAddress[];
  @Output() setAddress =  new EventEmitter();


  constructor(private userService:UserService) { }

  ngOnInit() {

    this.userService.getAddress().subscribe(data => {
      this.address = data;
      if (this.address.length > 0) {
        this.addressMode = 'select';
      }
    });
  }

  createAddress(data){

    this.userService.createAddress(data).subscribe(data => {
      this.addressMode = 'select';
      this.ngOnInit();
    });
  }

  SelectedAddress(address){

    this.setAddress.emit(address);
  }
}
