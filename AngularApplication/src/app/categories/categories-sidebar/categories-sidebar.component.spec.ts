import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CategoriesSidebarComponent } from './categories-sidebar.component';

describe('CategoriesSidebarComponent', () => {
  let component: CategoriesSidebarComponent;
  let fixture: ComponentFixture<CategoriesSidebarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CategoriesSidebarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CategoriesSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
