import { Injectable } from "@angular/core";
import { Observable } from 'rxjs';
import { ApiService } from './api.service';
import { ICategories } from '../models/categories';

@Injectable()
export class CategoriesService{
    constructor(private api: ApiService){ }

    getAll(): Observable<ICategories[]>{
        return this.api.get<ICategories[]>('/categories', 'getCategories')
    }

    // getProductsByCategoryId(id: number): Observable<IProduct[]>{
    //     return this.api.get<IProduct[]>('/categories/'+id, 'getProductsByCategoryId')
    // }
}
