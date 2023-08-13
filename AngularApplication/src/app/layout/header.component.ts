import { Component, OnInit } from "@angular/core";
import { ApiService } from '../services/api.service';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
    selector: "header",
    templateUrl: './header.component.html'
})

export class HeaderComponent implements OnInit{
  loggedIn: boolean = false
  constructor(private api: ApiService, private route: Router, private auth:AuthService) {
    if(localStorage.getItem('accessToken') !== null) {
      this.loggedIn = true;
    }
  }

  ngOnInit(){

  }

  logout(){
    this.loggedIn = false;
    this.auth.logout();


  }

}
