import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginFormComponent } from './login-form/login-form.component';
import { RegistrationFormComponent } from './registration-form/registration-form.component';
import { RouterModule } from '@angular/router';
import { userRoute } from './user.route';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { UserService } from '../services/user.service';
import { AuthenticateComponent } from './authenticate/authenticate.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(userRoute),
    ReactiveFormsModule,
    FormsModule
  ],
  declarations: [
    LoginFormComponent,
    RegistrationFormComponent,
    AuthenticateComponent,
  ],

  exports: [
  ],

  providers: [
    UserService
  ]
})
export class UserModule { }
