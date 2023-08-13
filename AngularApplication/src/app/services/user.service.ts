import { Injectable } from '@angular/core';
import { ILoggedUser } from '../models/user';
import { IAddress } from '../models/address';
import { ApiService } from './api.service';

@Injectable()

export class UserService{
    constructor(private api:ApiService){

    }


    register(data){
        return this.api.post<ILoggedUser>('/register',data, 'resgiter')
    }


    getAddress(){
        return this.api.get<IAddress[]>('/address', 'getAddress')
    }

    createAddress(data: IAddress){
        return this.api.post<IAddress>('/address', data, 'createAddress')
    }
}
