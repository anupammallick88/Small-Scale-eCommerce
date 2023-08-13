import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddressHomeComponent } from './address-home.component';

describe('AddressHomeComponent', () => {
  let component: AddressHomeComponent;
  let fixture: ComponentFixture<AddressHomeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddressHomeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddressHomeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
