<?php

namespace Msaaq\TikTok\Enums;

enum EventName: string
{
    case VIEW_CONTENT = 'ViewContent';
    case CLICK_BUTTON = 'ClickButton';
    case SEARCH = 'Search';
    case ADD_TO_WISH_LIST = 'AddToWishlist';
    case ADD_TO_CART = 'AddToCart';
    case INITIATE_CHECKOUT = 'InitiateCheckout';
    case ADD_PAYMENT_INFO = 'AddPaymentInfo';
    case COMPLETE_PAYMENT = 'CompletePayment';
    case PLACE_AN_ORDER = 'PlaceAnOrder';
    case CONTACT = 'Contact';
    case DOWNLOAD = 'Download';
    case SUBMIT_FORM = 'SubmitForm';
    case COMPLETE_REGISTRATION = 'CompleteRegistration';
    case SUBSCRIBE = 'Subscribe';
    case START_TRIAL = 'StartTrial';
    case PURCHASE = 'Purchase';
}
