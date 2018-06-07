<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Ixudra\Curl\Facades\Curl;

class AdminController extends Controller
{
    private $client = null;

    const API_URL = "https://rest-api.localhost";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->client = new Client();
        $this->headers = ['Authorization' => "Bearer $this->getAdminUserToken()"];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->createOffer();

        return view('adminpanel');
    }

    /**
     * Get the api token after login
     *
     * @return void
     */
    public function getAdminUserToken()
    {
        $payload = [
            'email' => auth()->user()->email,
            'password' => auth()->user()->password
        ];

        $adminUser = $this->client->request('POST', self::API_URL . '/api/login', $payload);

        return $adminUser->generateToken();
    }

    /**
     * Get the view for creating form
     *
     * @return view
     */
    public function createOffer()
    {
        return view('offerform');
    }

    /**
     * Create offer
     */
    public function create()
    {
        $offer = [
            'title' => request('title'),
            'description' => request('description'),
            'email' => request('email'),
            'image' => request('image'),
        ];

        $offerCreated = $this->client->request('POST', self::API_URL . '/api/offers', $this->getRequestedOffer(), $this->headers);
    }

    /**
     * Delete offer
     *
     * @return view
     */
    public function deleteOffer()
    {
        $this->client->request('delete', self::API_URL . '/api/offers', request('offer_id'), $this->headers);

        return view('adminpanel');
    }

    /**
     * Update an offer
     *
     * @return view
     */
    public function updateOffer()
    {
        return view('updateform');
    }

    /**
     * Update offer
     *
     * @return view
     */
    public function update()
    {
        $this->client->request('put', self::API_URL . '/api/offers', request('offer_id'), $this->headers);

        return view('adminpanel');
    }

    /**
     * Get the resquested data
     *
     * @return array
     */
    public function getRequestedOffer()
    {
        return [
            'title' => request('title'),
            'description' => request('description'),
            'email' => request('email'),
            'image' => request('image'),
        ];
    }
}
