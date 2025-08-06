<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //get FAQ page
    public function index()
    {
        $faqs = [
            [
                'question' => 'Is your chicken certified organic?',
                'answer' => 'We follow organic principles: no antibiotics, no hormones, natural feed, and humane care. While we may not have formal certification yet, we\'re completely transparent about our process.'
            ],
            [
                'question' => 'How is your chicken different from store-bought?',
                'answer' => 'Most commercial chicken is raised in cramped spaces and fed antibiotics. Ours is raised with care on open land, without any synthetic chemicals.'
            ],
            [
                'question' => 'How do I place an order?',
                'answer' => 'Visit our Products page or contact us directly via WhatsApp or our form.'
            ],
            [
                'question' => 'Do you offer home delivery?',
                'answer' => 'Yes, we deliver directly to your home within our coverage areas.'
            ],
            [
                'question' => 'What is your return policy?',
                'answer' => 'Customer satisfaction is our priority. If you are not completely satisfied with your order, please contact us within 24 hours of delivery for a full refund or replacement.'
            ],
            [
                'question' => 'How long do your products stay fresh?',
                'answer' => 'Our farm-fresh products stay fresh for the period indicated on each package when properly refrigerated. We include the production date on each package so you know exactly how fresh your products are.'
            ]
        ];

        $data = array(
            'title' => 'Frequently Asked Questions',
            'slug' => 'faq',
            'faqs' => $faqs
        );
        
        return view('frontend.faq', compact('data'));
    }
}