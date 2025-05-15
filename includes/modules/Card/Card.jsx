// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './card.css';

class Card extends Component {
    static slug = 'utmc_card';

    render() {
        const { 
            variant,
            heading,
            cardimage,
            alt,
            textarea,
            button_url,
            button_text
        } = this.props;

        // Generate unique ID for the card
        const cardId = `utm-card-${Math.random().toString(36).substr(2, 9)}`;
        const headingId = `${cardId}-heading`;

        return (
            <Fragment>
                <article 
                    className={`utm-card utm-card__outer utm-card--${variant}`}
                    aria-labelledby={headingId}
                >
                    <div className="utm-card__wrapper">
                        {/* We'll hide this visually but keep for screen readers */}
                        <h2 
                            id={headingId}
                            className="visually-hidden"
                        >
                            {heading}
                        </h2>

                        {/* Card image */}
                        {cardimage && (
                            <div className="utm-card__image" role="presentation">
                                <img 
                                    src={cardimage} 
                                    alt={alt || ''} 
                                    aria-hidden={!alt}
                                />
                            </div>
                        )}

                        {/* Card content */}
                        <div className="utm-card__content">
                            <div 
                                className="utm-card__headline"
                                aria-hidden="true"
                            >
                                {heading}
                            </div>
                            <div className="utm-card__body">
                                {textarea}
                            </div>

                            {/* Card link */}
                            {button_url && button_text && (
                                <div className="utm-card__link">
                                    <a 
                                        className={`utm-btn utm-card--${variant} utm-btn--link utm-btn--link-arrow`}
                                        href={button_url}
                                        aria-label={`${button_text} - ${heading}`}
                                    >
                                        <span>{button_text}</span>
                                        <span 
                                            className="utm-btn--arrow" 
                                            aria-hidden="true"
                                            role="presentation"
                                        />
                                    </a>
                                </div>
                            )}
                        </div>
                    </div>
                </article>
            </Fragment>
        );
    }
}

export default Card;
