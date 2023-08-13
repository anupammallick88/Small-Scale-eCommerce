import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormBuilder } from '@angular/forms';
import { AuthService } from 'src/app/services/auth.service';


@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {
  loginForm: FormGroup;
  constructor(private fb: FormBuilder, private auth: AuthService) { }

  ngOnInit() {

    this.loginForm = this.fb.group({
      email: [],
      password: []
    });
  }

  login(formValues){

    if(this.loginForm.valid){
      this.auth.login(formValues);
    }
  }



}
