import { Routes } from '@angular/router';
import { AuthenticateComponent } from './authenticate/authenticate.component';

export const userRoute: Routes = [
    {path: 'signin', component: AuthenticateComponent}
];
