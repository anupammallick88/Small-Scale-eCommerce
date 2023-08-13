import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrderShowComponent } from './order-show.component';

describe('OrderShowComponent', () => {
  let component: OrderShowComponent;
  let fixture: ComponentFixture<OrderShowComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrderShowComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrderShowComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
