import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { MockComponent } from 'ng2-mock-component';

import { NavigationComponent } from './navigation.component';

describe('NavigationComponent', () => {
  let component: NavigationComponent;
  let fixture: ComponentFixture<NavigationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [
        NavigationComponent,

        MockComponent({
          selector: 'hazdev-template-navigation-group',
          inputs: ['navHrefLink', 'navRouterLink', 'display']
        }),
        MockComponent({
          selector: 'hazdev-template-navigation-item',
          inputs: ['navHrefLink', 'navRouterLink', 'display']
        }),
        MockComponent({ selector: 'mat-nav-list' }),
        MockComponent({ selector: 'mat-form-field' })
      ]
    }).compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NavigationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
