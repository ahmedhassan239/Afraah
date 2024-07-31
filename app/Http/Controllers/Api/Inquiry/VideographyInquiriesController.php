<?php

namespace App\Http\Controllers\Api\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Traits\InquiryTrait;
use App\Models\Videography;
use Illuminate\Http\Request;
use function auth;

class VideographyInquiriesController extends Controller
{
    // init Inquiry trait
    use InquiryTrait {
        InquiryTrait::__construct as private __InquiryConstruct;
    }

    public function __construct(Videography $model)
    {
        // auth()->setDefaultDriver('api');
        // pass  model
        $this->__InquiryConstruct($model);
    }

    public function insert(Request $request)
    {

        return $this->inquiry($request);
    }
}
