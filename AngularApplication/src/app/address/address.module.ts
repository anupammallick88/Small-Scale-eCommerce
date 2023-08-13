import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AddressHomeComponent } from './address-home/address-home.component';
import { AddressCreateComponent } from './address-create/address-create.component';
import { AddressListComponent } from './address-list/address-list.component';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AddressHomeComponent,
    AddressCreateComponent,
    AddressListComponent
  ],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    FormsModule
  ],
  exports: [
    AddressCreateComponent,
    AddressHomeComponent,
    AddressListComponent
  ]
})
export class AddressModule { }
