// External Dependencies
import React, { Component } from 'react';

class JumpMenu extends Component {
  static slug = 'jump_menu';
  static counter = 0;

  _renderKicker() {
    const { jm_kicker } = this.props;
    if (!jm_kicker) {
      return '';
    }
    return (
      <div className="utm-jumpmenu__kicker" role="complementary" aria-label="Quick Links Section Kicker">
        {jm_kicker}
      </div>
    );
  }

  render() {
    const { module_id, module_class, content } = this.props;
    const moduleId = module_id || `jump-menu-${++JumpMenu.counter}`;
    const classes = module_class ? `${module_class} utm-jumpmenu__links` : 'utm-jumpmenu__links';
    const headingId = `${moduleId}-heading`;

    return (
      <nav 
        className="utm-jumpmenu__wrapper" 
        aria-labelledby={headingId}
      >
        {this._renderKicker()}
        <div 
          id={moduleId} 
          className={classes}
          role="list"
          aria-label="Quick links navigation"
        >
          {content}
        </div>
      </nav>
    );
  }
}

export default JumpMenu;
