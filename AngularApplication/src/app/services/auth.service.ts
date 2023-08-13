import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { Router } from '@angular/router';

@Injectable()
export class AuthService {

  constructor(private api: ApiService, private route: Router) {}

  login(formData){
    this.api.post<any>('/login', formData, 'login').subscribe(data => {
      if (data && data.user && data.user.name){
        localStorage.setItem('accessToken', data.access_token);
        this.route.navigate(['/home']).then(() => {
          window.location.reload();
        });
      }
      else {
        window.alert(data.message);
      }
    });
  }

  logout() {
    this.api.post('/logout', {}, 'logout').subscribe(() => {
      localStorage.removeItem('accessToken');
      this.route.navigate(['/user/signin']);
    });
  }

  isLoggedIn() {
    if (localStorage.getItem('accessToken')) {
      return true;
    }
    return false;
  }
}
