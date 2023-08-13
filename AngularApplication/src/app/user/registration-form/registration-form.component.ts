import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, FormBuilder } from '@angular/forms';
import { UserService } from '../../services/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-registration-form',
  templateUrl: './registration-form.component.html',
  styleUrls: ['./registration-form.component.css']
})
export class RegistrationFormComponent implements OnInit {
  signupForm: FormGroup;

  constructor(private userService: UserService, private fb: FormBuilder, private route: Router) { }

  ngOnInit() {

    this.signupForm = this.fb.group({
      name: [],
      email: [],
      password: [],
      password_confirmation: []
    })
  }

  SignUp(formValues){
    this.userService.register(formValues).subscribe(data =>{
      localStorage.setItem('accessToken', data.access_token);
      this.route.navigate(['/home']).then(() => {
        window.location.reload();
      });
    });
  }

}
