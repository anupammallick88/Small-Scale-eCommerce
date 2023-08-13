import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { catchError } from 'rxjs/operators';
import { Observable, of } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable()
export class ApiService {
    token = localStorage.getItem('accessToken');
    option = {headers: new HttpHeaders({
      'Accept': 'application/json',
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Headers': 'Authorization,Content-Type',
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + this.token
    })};

    constructor(private http: HttpClient) {}

    get<T>(path, operation) {
        return this.http.get<T>(environment.api_url + path, this.option).pipe(catchError(this.handleError<T>(operation)))
    }

    post<T>(path, data, operation) {
      // console.log(this.token);
        return this.http.post<T>(environment.api_url + path, data, this.option).pipe(catchError(this.handleError<T>(operation)))
    }

    delete<T>(path, operation) {
        return this.http.delete<T>(environment.api_url + path, this.option).pipe(catchError(this.handleError<T>(operation)))
    }

    patch<T>(path, data, operation) {
        return this.http.patch<T>(environment.api_url + path, data).pipe(catchError(this.handleError<T>(operation)))
    }

    private handleError<T>(operation = 'operation', result?: T) {
        return (error: any): Observable<T> => {
          console.error(error);
          return of(result as T);
        };
    }
}
