<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Statistics\UserService;
use App\Models\CustomTemplate;
use App\Models\Template;
use App\Models\SubscriptionPlan;
use App\Models\PrepaidPlan;
use App\Models\Subscriber;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserIntegration;
use App\Models\MainSetting;
use App\Models\Setting;
use App\Models\Extension;
use App\Models\ExtensionSetting;
use App\Models\ImageCredit;
use App\Models\ApiCredit;
use Carbon\Carbon;

class HelperService 
{
    public static function getTotalWords()
    {   
        if (auth()->user()-> tokens != -1) {
            $value = number_format(auth()->user()-> tokens + auth()->user()-> tokens_prepaid);
        } else {
            $value = __('Unlimited');
        }
        
        return $value;
    }

    public static function getTotalImages()
    {   
        if (auth()->user()->images != -1) {
            $value = number_format(auth()->user()->images + auth()->user()->images_prepaid);
        } else {
            $value = __('Unlimited');
        }
        
        return $value;
    }

    public static function getTotalMinutes()
    {   
        if (auth()->user()->minutes != -1) {
            $value = number_format(auth()->user()->minutes + auth()->user()->minutes_prepaid);
        } else {
            $value = __('Unlimited');
        }

        return $value;
    }

    public static function getTotalCharacters()
    {   
        if (auth()->user()->characters != -1) {
            $value = number_format(auth()->user()->characters + auth()->user()->characters_prepaid);
        } else {
            $value = __('Unlimited');
        }

        return $value;
    }

    public static function listTemplates()
    {   
        $all_templates = Template::orderBy('group', 'asc')->where('status', true)->get();
        return $all_templates;
    }

    public static function listCustomTemplates()
    {   
        $custom_templates = CustomTemplate::orderBy('group', 'asc')->where('user_id', auth()->user()->id)->where('status', true)->get();
        return $custom_templates;
    }

    public static function userAvailableGPT4TWords()
    {   
        $value = self::numberFormat(auth()->user()->gpt_4_turbo_credits + auth()->user()->gpt_4_turbo_credits_prepaid);
        return $value;
    }

    public static function userAvailableGPT4Words()
    {   
        $value = self::numberFormat(auth()->user()->gpt_4_credits + auth()->user()->gpt_4_credits_prepaid);
        return $value;
    }

    public static function userAvailableGPT4oWords()
    {   
        $value = self::numberFormat(auth()->user()->gpt_4o_credits + auth()->user()->gpt_4o_credits_prepaid);
        return $value;
    }

    public static function userAvailableGPT4oMiniWords()
    {   
        $value = self::numberFormat(auth()->user()->gpt_4o_mini_credits + auth()->user()->gpt_4o_mini_credits_prepaid);
        return $value;
    }

    public static function userAvailableO1PreviewWords()
    {   
        $value = self::numberFormat(auth()->user()->o1_preview_credits + auth()->user()->o1_preview_credits_prepaid);
        return $value;
    }

    public static function userAvailableO1MiniWords()
    {   
        $value = self::numberFormat(auth()->user()->o1_mini_credits + auth()->user()->o1_mini_credits_prepaid);
        return $value;
    }

    public static function userAvailableFineTuneWords()
    {   
        $value = self::numberFormat(auth()->user()->fine_tune_credits + auth()->user()->fine_tune_credits_prepaid);
        return $value;
    }

    public static function userAvailableClaudeOpusWords()
    {   
        $value = self::numberFormat(auth()->user()->claude_3_opus_credits + auth()->user()->claude_3_opus_credits_prepaid);
        return $value;
    }

    public static function userAvailableClaudeSonnetWords()
    {   
        $value = self::numberFormat(auth()->user()->claude_3_sonnet_credits + auth()->user()->claude_3_sonnet_credits_prepaid);
        return $value;
    }

    public static function userAvailableClaudeHaikuWords()
    {   
        $value = self::numberFormat(auth()->user()->claude_3_haiku_credits + auth()->user()->claude_3_haiku_credits_prepaid);
        return $value;
    }

    public static function userAvailableGeminiProWords()
    {   
        $value = self::numberFormat(auth()->user()->gemini_pro_credits + auth()->user()->gemini_pro_credits_prepaid);
        return $value;
    }
    public static function userAvailableWords()
    {
        $value = self::numberFormat(auth()->user()->gpt_3_turbo_credits + auth()->user()->gpt_3_turbo_credits_prepaid);
        return $value;
    }
    public static function userAvailableTokens()
    {   
        $value = self::numberFormat(auth()->user()->tokens + auth()->user()->tokens_prepaid);
        return $value;
    }

    public static function userAvailableImages()
    {   
        $value = self::numberFormat(auth()->user()->images + auth()->user()->images_prepaid);
        return $value;
    }

    public static function userAvailableChars()
    {   
        $value = self::numberFormat(auth()->user()->characters + auth()->user()->characters_prepaid);
        return $value;
    }

    public static function userAvailableMinutes()
    {   
        $value = self::minutesFormat(auth()->user()->minutes + auth()->user()->minutes_prepaid);
        return $value;
    }

    public static function getPlanName()
    {   
        $subscription = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();

        if ($subscription) {
            return $subscription->plan_name;
        } else {
            return 'Not Found';
        }
        
    }

    public static function getRenewalDate()
    {   
        $subscription = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();

        if ($subscription) {
            if ($subscription->frequency == 'lifetime') {
                return __('Free Forever');
            } else {
                return date_format(Carbon::parse($subscription->active_until), 'd M Y');
            }
        } else {
            return 'Not Found';
        }
        
    }

    public static function numberFormat($num) {

        if($num > 1000) {
      
              $x = round($num);
              $x_number_format = number_format($x);
              $x_array = explode(',', $x_number_format);
              $x_parts = array('K', 'M', 'B', 'T');
              $x_count_parts = count($x_array) - 1;
              $x_display = $x;
              $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
              $x_display .= $x_parts[$x_count_parts - 1];
      
              return $x_display;
      
        }
      
        return $num;
    }

    public static function minutesFormat($num) {

        $num = floor($num);

        if($num > 1000) {
      
              $x = round($num);
              $x_number_format = number_format($x);
              $x_array = explode(',', $x_number_format);
              $x_parts = array('K', 'M', 'B', 'T');
              $x_count_parts = count($x_array) - 1;
              $x_display = $x;
              $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
              $x_display .= $x_parts[$x_count_parts - 1];
      
              return $x_display;
      
        }
      
        return $num;
    }


    /**
	*
	* Check if user has sufficient credits for each model
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function creditCheck($model, $max_tokens)
    {
        if (auth()->user()->tokens != -1) {
            if ((auth()->user()->tokens + auth()->user()->tokens_prepaid) < $max_tokens) {
                if (!is_null(auth()->user()->member_of)) {
                    if (auth()->user()->member_use_credits_template) {
                        $member = User::where('id', auth()->user()->member_of)->first();
                        if (($member->tokens + $member->tokens_prepaid) < $max_tokens) {
                            $data['status'] = 'error';
                            $data['message'] = __('Not enough balance to proceed, subscribe or top up');
                            return $data;
                        }
                    } else {
                        $data['status'] = 'error';
                        $data['message'] = __('Not enough balance to proceed, subscribe or top up');
                        return $data;
                    }
                    
                } else {
                    $data['status'] = 'error';
                    $data['message'] = __('Not enough balance to proceed, subscribe or top up');
                    return $data;
                } 
            }
        }

    }


    /**
	*
	* Update user word balance for each model
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function updateBalance($words, $model, $input_tokens = 0, $output_tokens = 0) {

        $setting = MainSetting::first();
        $user = User::find(Auth::user()->id);
        $usage = 0;

        $usage = self::modelCreditMultiplier($model, $setting->model_charge_type, $input_tokens, $output_tokens);

        if (auth()->user()->tokens != -1) {

            if (Auth::user()->tokens > $usage) {

                $total_usage =  $user->tokens - $usage;
                $user->tokens = ($total_usage < 0) ? 0 : $total_usage;
                $user->save();
    
            } elseif (Auth::user()->tokens_prepaid > $usage) {
    
                $total_usage_prepaid =  $user->tokens_prepaid - $usage;
                $user->tokens_prepaid = ($total_usage_prepaid < 0) ? 0 : $total_usage_prepaid;
                $user->save();
    
            } elseif ((Auth::user()->tokens + Auth::user()->tokens_prepaid) == $usage) {
    
                $user->tokens = 0;
                $user->tokens_prepaid = 0;
                $user->save();
    
            } else {
    
                if (!is_null(Auth::user()->member_of)) {
    
                    $member = User::where('id', Auth::user()->member_of)->first();
    
                    if ($member->tokens > $usage) {
    
                        $total_usage = $member->tokens - $usage;
                        $member->tokens = ($total_usage < 0) ? 0 : $total_usage;
            
                    } elseif ($member->tokens_prepaid > $usage) {
            
                        $total_usage_prepaid = $member->tokens_prepaid - $usage;
                        $member->tokens_prepaid = ($total_usage_prepaid < 0) ? 0 : $total_usage_prepaid;
            
                    } elseif (($member->tokens + $member->tokens_prepaid) == $usage) {
            
                        $member->tokens = 0;
                        $member->tokens_prepaid = 0;
            
                    } else {
                        $remaining = $usage - $member->tokens;
                        $member->tokens = 0;
        
                        $prepaid_left = $member->tokens_prepaid - $remaining;
                        $member->tokens_prepaid = ($prepaid_left < 0) ? 0 : $prepaid_left;
                    }
    
                    $member->update();
    
                } else {
                    $remaining = $usage - Auth::user()->tokens;
                    $user->tokens = 0;
    
                    $prepaid_left = Auth::user()->tokens_prepaid - $remaining;
                    $user->tokens_prepaid = ($prepaid_left < 0) ? 0 : $prepaid_left;
                    $user->update();
                }
            }
        } 

        return true;

    }


    private static function modelCreditMultiplier($model, $charge_type, $input_tokens = 0, $output_tokens)
    {
        $api = ApiCredit::first();
        $total = 0;

        switch ($model) {
            case 'o3-mini': 
                    if ($charge_type == 'both') {
                        $total = ($api->o3_mini_input_token * $input_tokens) + ($api->o3_mini_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->o3_mini_input_token * $input_tokens;
                    } else {
                        $total = $api->o3_mini_output_token * $output_tokens;
                    }
                break;
            case 'o1': 
                    if ($charge_type == 'both') {
                        $total = ($api->o1_input_token * $input_tokens) + ($api->o1_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->o1_input_token * $input_tokens;
                    } else {
                        $total = $api->o1_output_token * $output_tokens;
                    }
                break;
            case 'o1-mini': 
                    if ($charge_type == 'both') {
                        $total = ($api->o1_mini_input_token * $input_tokens) + ($api->o1_mini_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->o1_mini_input_token * $input_tokens;
                    } else {
                        $total = $api->o1_mini_output_token * $output_tokens;
                    }
                break;
            case 'gpt-4.5-preview': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_45_input_token * $input_tokens) + ($api->gpt_45_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_45_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_45_output_token * $output_tokens;
                    }
                break;
            case 'gpt-4': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_4_input_token * $input_tokens) + ($api->gpt_4_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_4_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_4_output_token * $output_tokens;
                    }
                break;
            case 'gpt-4-0125-preview': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_4_turbo_input_token * $input_tokens) + ($api->gpt_4_turbo_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_4_turbo_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_4_turbo_output_token * $output_tokens;
                    }
                break;
            case 'gpt-4o': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_4o_input_token * $input_tokens) + ($api->gpt_4o_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_4o_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_4o_output_token * $output_tokens;
                    }
                break;
            case 'gpt-4o-mini': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_4o_mini_input_token * $input_tokens) + ($api->gpt_4o_mini_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_4o_mini_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_4o_mini_output_token * $output_tokens;
                    }
                break;
            case 'gpt-3.5-turbo-0125': 
                    if ($charge_type == 'both') {
                        $total = ($api->gpt_35_turbo_input_token * $input_tokens) + ($api->gpt_35_turbo_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gpt_35_turbo_input_token * $input_tokens;
                    } else {
                        $total = $api->gpt_35_turbo_output_token * $output_tokens;
                    }
                break;
            case 'claude-3-opus-20240229': 
                    if ($charge_type == 'both') {
                        $total = ($api->claude_3_opus_input_token * $input_tokens) + ($api->claude_3_opus_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->claude_3_opus_input_token * $input_tokens;
                    } else {
                        $total = $api->claude_3_opus_output_token * $output_tokens;
                    }
                break;
            case 'claude-3-5-sonnet-20241022': 
                    if ($charge_type == 'both') {
                        $total = ($api->claude_35_sonnet_input_token * $input_tokens) + ($api->claude_35_sonnet_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->claude_35_sonnet_input_token * $input_tokens;
                    } else {
                        $total = $api->claude_35_sonnet_output_token * $output_tokens;
                    }
                break;
            case 'claude-3-7-sonnet-20250219': 
                    if ($charge_type == 'both') {
                        $total = ($api->claude_37_sonnet_input_token * $input_tokens) + ($api->claude_37_sonnet_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->claude_37_sonnet_input_token * $input_tokens;
                    } else {
                        $total = $api->claude_37_sonnet_output_token * $output_tokens;
                    }
                break;
            case 'claude-3-5-haiku-20241022': 
                    if ($charge_type == 'both') {
                        $total = ($api->claude_35_haiku_input_token * $input_tokens) + ($api->claude_35_haiku_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->claude_35_haiku_input_token * $input_tokens;
                    } else {
                        $total = $api->claude_35_haiku_output_token * $output_tokens;
                    }
                break;
            case 'gemini-2.0-flash': 
                    if ($charge_type == 'both') {
                        $total = ($api->gemini_20_flash_input_token * $input_tokens) + ($api->gemini_20_flash_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gemini_20_flash_input_token * $input_tokens;
                    } else {
                        $total = $api->gemini_20_flash_output_token * $output_tokens;
                    }
                break;
            case 'gemini-1.5-flash': 
                    if ($charge_type == 'both') {
                        $total = ($api->gemini_15_flash_input_token * $input_tokens) + ($api->gemini_15_flash_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gemini_15_flash_input_token * $input_tokens;
                    } else {
                        $total = $api->gemini_15_flash_output_token * $output_tokens;
                    }
                break;
            case 'gemini-1.5-pro': 
                    if ($charge_type == 'both') {
                        $total = ($api->gemini_15_pro_input_token * $input_tokens) + ($api->gemini_15_pro_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->gemini_15_pro_input_token * $input_tokens;
                    } else {
                        $total = $api->gemini_15_pro_output_token * $output_tokens;
                    }
                break;
            case 'deepseek-reasoner': 
                    if ($charge_type == 'both') {
                        $total = ($api->deepseek_r1_input_token * $input_tokens) + ($api->deepseek_r1_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->deepseek_r1_input_token * $input_tokens;
                    } else {
                        $total = $api->deepseek_r1_output_token * $output_tokens;
                    }
                break;
            case 'deepseek-chat': 
                    if ($charge_type == 'both') {
                        $total = ($api->deepseek_v3_input_token * $input_tokens) + ($api->deepseek_v3_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->deepseek_v3_input_token * $input_tokens;
                    } else {
                        $total = $api->deepseek_v3_output_token * $output_tokens;
                    }
                break;
            case 'grok-2-1212': 
                    if ($charge_type == 'both') {
                        $total = ($api->grok_2_input_token * $input_tokens) + ($api->grok_2_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->grok_2_input_token * $input_tokens;
                    } else {
                        $total = $api->grok_2_output_token * $output_tokens;
                    }
                break;
            case 'grok-2-vision-1212': 
                    if ($charge_type == 'both') {
                        $total = ($api->grok_2_vision_input_token * $input_tokens) + ($api->grok_2_vision_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->grok_2_vision_input_token * $input_tokens;
                    } else {
                        $total = $api->grok_2_vision_output_token * $output_tokens;
                    }
                break;
            case 'sonar-reasoning-pro': 
                    if ($charge_type == 'both') {
                        $total = ($api->sonar_reasoning_pro_input_token * $input_tokens) + ($api->sonar_reasoning_pro_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->sonar_reasoning_pro_input_token * $input_tokens;
                    } else {
                        $total = $api->sonar_reasoning_pro_output_token * $output_tokens;
                    }
                break;
            case 'sonar-reasoning': 
                    if ($charge_type == 'both') {
                        $total = ($api->sonar_reasoning_input_token * $input_tokens) + ($api->sonar_reasoning_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->sonar_reasoning_input_token * $input_tokens;
                    } else {
                        $total = $api->sonar_reasoning_output_token * $output_tokens;
                    }
                break;
            case 'sonar-pro': 
                    if ($charge_type == 'both') {
                        $total = ($api->sonar_pro_input_token * $input_tokens) + ($api->sonar_pro_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->sonar_pro_input_token * $input_tokens;
                    } else {
                        $total = $api->sonar_pro_output_token * $output_tokens;
                    }
                break;
            case 'sonar': 
                    if ($charge_type == 'both') {
                        $total = ($api->sonar_input_token * $input_tokens) + ($api->sonar_output_token * $output_tokens);
                    } elseif ($charge_type == 'input') {
                        $total = $api->sonar_input_token * $input_tokens;
                    } else {
                        $total = $api->sonar_output_token * $output_tokens;
                    }
                break;                
        }

        return $total;
    }


    /**
	*
	* Check if user has sufficient media credits for each model
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function checkMediaCredits($model)
    {
        $credits = ImageCredit::first()->toArray();
        $cost = 1;

        foreach($credits as $key=>$value) {
            if ($key == $model) {
                $cost = $value;
            }
        }

        if (auth()->user()->images != -1) {
            if ((auth()->user()->images + auth()->user()->images_prepaid) < $cost) {
                if (!is_null(auth()->user()->member_of)) {
                    if (auth()->user()->member_use_credits_image) {
                        $member = User::where('id', auth()->user()->member_of)->first();
                        if (($member->images + $member->images_prepaid) < $cost) {
                            return false;
                        }
                    } else {
                        return false;
                    }
                    
                } else {
                    return false;
                } 
            }
        }

        return true;
    }


    /**
	*
	* Update user media balance for image/video/music tasks
	* @param - model name
	* @return - confirmation
	*
	*/
    public static function updateMediaBalance($model, $count = 1) 
    {
        $credits = ImageCredit::first()->toArray();
        $cost = 1;

        foreach($credits as $key=>$value) {
            if ($key == $model) {
                $cost = $value;
            }
        }

        $user = User::where('id', Auth::user()->id)->first();

        for ($i=0; $i < $count; $i++) { 
            if (auth()->user()->images != -1) {
        
                if (Auth::user()->images > $cost) {
                    $total_images = $user->images - $cost;
                    $user->images = ($total_images < 0) ? 0 : $total_images;
                    $user->save();
    
                } elseif (Auth::user()->images_prepaid > $cost) {
    
                    $total_images_prepaid = $user->images_prepaid - $cost;
                    $user->images_prepaid = ($total_images_prepaid < 0) ? 0 : $total_images_prepaid;
                    $user->save();
    
                } elseif ((Auth::user()->images + Auth::user()->images_prepaid) == $cost) {
    
                    $user->images = 0;
                    $user->images_prepaid = 0;
                    $user->save();
    
                } else {
    
                    if (!is_null(Auth::user()->member_of)) {
    
                        $member = User::where('id', Auth::user()->member_of)->first();
    
                        if ($member->images > $cost) {
    
                            $total_images = $member->images - $cost;
                            $member->images = ($total_images < 0) ? 0 : $total_images;
                
                        } elseif ($member->images_prepaid > $cost) {
                
                            $total_images_prepaid = $member->images_prepaid - $cost;
                            $member->images_prepaid = ($total_images_prepaid < 0) ? 0 : $total_images_prepaid;
                
                        } elseif (($member->images + $member->images_prepaid) == $cost) {
                
                            $member->images = 0;
                            $member->images_prepaid = 0;
                
                        } else {
                            $remaining = $cost - $member->images;
                            $member->images = 0;
            
                            $prepaid_left = $member->images_prepaid - $remaining;
                            $member->images_prepaid = ($prepaid_left < 0) ? 0 : $prepaid_left;
                        }
    
                        $member->save();
    
                    } else {
                        $remaining = $cost - Auth::user()->images;
                        $user->images = 0;
    
                        $prepaid_left = Auth::user()->images_prepaid - $remaining;
                        $user->images_prepaid = ($prepaid_left < 0) ? 0 : $prepaid_left;
    
                        $user->save();
                    }
                }
            }
        }
        
    }


    /**
	*
	* Update user character balance
	* @param - model name
	* @return - confirmation
	*
	*/
    public static function updateCharacterBalance($total) 
    {
        $user = User::find(Auth::user()->id);

        if (auth()->user()->characters != -1) {
            
            if (Auth::user()->characters > $total) {

                $total_chars = Auth::user()->characters - $total;
                $user->characters = ($total_chars < 0) ? 0 : $total_chars;

            } elseif (Auth::user()->characters_prepaid > $total) {

                $total_chars_prepaid = Auth::user()->characters_prepaid - $total;
                $user->characters_prepaid = ($total_chars_prepaid < 0) ? 0 : $total_chars_prepaid;

            } elseif ((Auth::user()->characters + Auth::user()->characters_prepaid) == $total) {

                $user->characters = 0;
                $user->characters_prepaid = 0;

            } else {

                if (!is_null(Auth::user()->member_of)) {

                    $member = User::where('id', Auth::user()->member_of)->first();

                    if ($member->characters > $total) {

                        $total_chars = $member->characters - $total;
                        $member->characters = ($total_chars < 0) ? 0 : $total_chars;
            
                    } elseif ($member->available_words_prepaid > $total) {
            
                        $total_chars_prepaid = $member->characters_prepaid - $total;
                        $member->characters_prepaid = ($total_chars_prepaid < 0) ? 0 : $total_chars_prepaid;
            
                    } elseif (($member->characters + $member->characters_prepaid) == $total) {
            
                        $member->characters = 0;
                        $member->characters_prepaid = 0;
            
                    } else {
                        $remaining = $total - $member->characters;
                        $member->characters = 0;
        
                        $prepaid_left = $member->characters_prepaid - $remaining;
                        $member->characters_prepaid = ($prepaid_left < 0) ? 0 : $prepaid_left;
                    }

                    $member->update();

                } else {

                    $remaining = $total - Auth::user()->characters;
                    $user->characters = 0;

                    $used = Auth::user()->characters_prepaid - $remaining;
                    $user->characters_prepaid = ($used < 0) ? 0 : $used;
                }
            }
        }

        $user->update();

    }


    /**
	*
	* Register subscriber for lifetime plan
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerSubscriber(SubscriptionPlan $id, $gateway, $status, $order, $days)
    {

        $subscription = Subscriber::create([
            'user_id' => auth()->user()->id,
            'plan_id' => $id->id,
            'status' => $status,
            'created_at' => now(),
            'gateway' => $gateway,
            'frequency' => 'lifetime',
            'plan_name' => $id->plan_name,
            'tokens' => $id->token_credits,
            'images' => $id->image_credits,
            'characters' => $id->characters,
            'minutes' => $id->minutes,
            'subscription_id' => $order,
            'active_until' => Carbon::now()->addDays($days),
        ]);  
    }


    /**
	*
	* Register prepaid plan payment
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerPayment($type, $id, $order, $price, $gateway, $status)
    {
        if ($type == 'prepaid') {
            $id = PrepaidPlan::where('id', $id)->first();
        } else {
            $id = SubscriptionPlan::where('id', $id)->first();
        }

        $record_payment = new Payment();
        $record_payment->user_id = auth()->user()->id;
        $record_payment->order_id = $order;
        $record_payment->plan_id = $id->id;
        $record_payment->plan_name = $id->plan_name;
        $record_payment->price = $price;
        $record_payment->frequency = $type;
        $record_payment->currency = $id->currency;
        $record_payment->gateway = $gateway;
        $record_payment->status = $status;
        $record_payment->tokens = $id->tokens;
        $record_payment->images = $id->images;
        $record_payment->characters = $id->characters;
        $record_payment->minutes = $id->minutes;
        $record_payment->save();

        return $record_payment;
    }


    /**
	*
	* Assign prepaid and lifetime credits
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerCredits($type, $id)
    {
        if ($type == 'prepaid') {
            $plan = PrepaidPlan::where('id', $id)->first();
        } else {
            $plan = SubscriptionPlan::where('id', $id)->first();
        }
        
        $user = User::where('id',auth()->user()->id)->first();

        if ($type == 'lifetime') {
            $group = (auth()->user()->hasRole('admin'))? 'admin' : 'subscriber';
            $user->syncRoles($group);    
            $user->group = $group;
            $user->plan_id = $plan->id;            
            $user->characters = $plan->characters;
            $user->minutes = $plan->minutes;
            $user->member_limit = $plan->team_members;
            $user->images = $plan->image_credits;
            $user->tokens = $plan->token_credits;
        } else {           
            $user->tokens_prepaid = $user->tokens_prepaid + $plan->tokens;
            $user->images_prepaid = $user->images_prepaid + $plan->images;
            $user->characters_prepaid = $user->characters_prepaid + $plan->characters;
            $user->minutes_prepaid = $user->minutes_prepaid + $plan->minutes;
        }

        $user->save();
    }


    /**
	*
	* Register monthly yearly subscriber
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerRecurringSubscriber(SubscriptionPlan $id, $gateway, $status, $order)
    {
        $duration = ($id->payment_frequency == 'monthly') ? 30 : 365;

        $subscription = Subscriber::create([
            'active_until' => Carbon::now()->addDays($duration),
            'user_id' => auth()->user()->id,
            'plan_id' => $id->id,
            'status' => $status,
            'created_at' => now(),
            'gateway' => $gateway,
            'frequency' => $id->payment_frequency,
            'plan_name' => $id->plan_name,
            'images' => $id->image_credits,
            'characters' => $id->characters,
            'minutes' => $id->minutes,
            'tokens' => $id->token_credits,
            'subscription_id' => $order,
        ]);  
    }


    /**
	*
	* Register montly/yearly payments
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerRecurringPayment(SubscriptionPlan $id, $orderID, $gateway, $status, User $user = null)
    {
        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;

        $record_payment = new Payment();

        if ($user) {
            $record_payment->user_id = $user->id;
        } else {
            $record_payment->user_id = auth()->user()->id;  
        }
        
        $record_payment->plan_id = $id->id;
        $record_payment->order_id = $orderID;
        $record_payment->plan_name = $id->plan_name;
        $record_payment->frequency = $id->payment_frequency;
        $record_payment->price = $total_value;
        $record_payment->currency = $id->currency;
        $record_payment->gateway = $gateway;
        $record_payment->status = $status;       
        $record_payment->tokens = $id->token_credits;
        $record_payment->images = $id->image_credits;
        $record_payment->characters = $id->characters;
        $record_payment->minutes = $id->minutes;
        $record_payment->save();  

        return $record_payment;
    }


    /**
	*
	* Assign monthly and yearly credits
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public static function registerRecurringCredits(User $user, $type, $id)
    {
        if ($type == 'prepaid') {
            $plan = PrepaidPlan::where('id', $id)->first();
        } else {
            $plan = SubscriptionPlan::where('id', $id)->first();
        }

        if ($type == 'prepaid') {
            $user->images_prepaid = $user->images_prepaid + $plan->images;
            $user->characters_prepaid = $user->characters_prepaid + $plan->characters;
            $user->minutes_prepaid = $user->minutes_prepaid + $plan->minutes;
        } else {        
            $group = ($user->hasRole('admin')) ? 'admin' : 'subscriber';
            $user->syncRoles($group);   
            $user->group = $group;
            $user->plan_id = $plan->id;           
            $user->characters = $plan->characters;
            $user->minutes = $plan->minutes;
            $user->member_limit = $plan->team_members;
            $user->images = $plan->image_credits;
            $user->tokens = $plan->token_credits;
        }

        $user->save();
    }


     public static function mainPlanModel()
    {
        $default = auth()->user()->default_model_template;

        switch ($default) {
            case 'gpt-3.5-turbo-0125':
                $model = 'GPT 3.5 Turbo';
                break;
            case 'gpt-4':
                $model = 'GPT 4';
                break;
            case 'gpt-4o':
                $model = 'GPT 4o';
                break;
            case 'gpt-4o-mini':
                $model = 'GPT 4o mini';
                break;
            case 'gpt-4-0125-preview':
                $model = 'GPT 4 Turbo';
                break;            
            case 'gpt-4-turbo-2024-04-09':
                $model = 'GPT 4 Turbo Vision';
                break;
            case 'o1-mini':
                $model = 'o1 mini';
                break;
            case 'o1-preview':
                $model = 'o1 preview';
                break;
            case 'claude-3-opus-20240229':
                $model = 'Claude 3 Opus';
                break;
            case 'claude-3-5-sonnet-20241022':
                $model = 'Claude 3.5 Sonnet';
                break;
            case 'claude-3-5-haiku-20241022':
                $model = 'Claude 3.5 Haiku';
                break;
            case 'gemini_pro':
                $model = 'Gemini Pro';
                break;
            default:
                $model = 'Fine Tune';
                break;
        }

        return $model;
    }

    public static function mainPlanBalance()
    {
        $default = auth()->user()->default_model_template;

        switch ($default) {
            case 'gpt-3.5-turbo-0125':
                $balance = (auth()->user()->gpt_3_turbo_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableWords();
                break;
            case 'gpt-4':
                $balance = (auth()->user()->gpt_4_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGPT4Words();
                break;
            case 'gpt-4o':
                $balance = (auth()->user()->gpt_4o_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGPT4oWords();
                break;
            case 'gpt-4o-mini':
                $balance = (auth()->user()->gpt_4o_mini_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGPT4oMiniWords();
                break;
            case 'gpt-4-0125-preview':
                $balance = (auth()->user()->gpt_4_turbo_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGPT4TWords();
                break;            
            case 'gpt-4-turbo-2024-04-09':
                $balance = (auth()->user()->gpt_4_turbo_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGPT4TWords();
                break;
            case 'o1-mini':
                $balance = (auth()->user()->o1_mini_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableO1MiniWords();
                break;
            case 'o1-preview':
                $balance = (auth()->user()->o1_preview_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableO1PreviewWords();
                break;
            case 'claude-3-opus-20240229':
                $balance = (auth()->user()->claude_3_opus_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableClaudeOpusWords();
                break;
            case 'claude-3-5-sonnet-20241022':
                $balance = (auth()->user()->claude_3_sonnet_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableClaudeSonnetWords();
                break;
            case 'claude-3-5-haiku-20241022':
                $balance = (auth()->user()->claude_3_haiku_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableClaudeHaikuWords();
                break;
            case 'gemini_pro':
                $balance = (auth()->user()->gemini_pro_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableGeminiProWords();
                break;
            default:
                $balance = (auth()->user()->fine_tune_credits == -1) ? __('Unlimited') : \App\Services\HelperService::userAvailableFineTuneWords();
                break;
        }

        return $balance;
    }

    public static function checkDBStatus()
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public static function checkField(string $key, $default = null)
    {
        $setting = MainSetting::query()->first();
        return $setting?->getAttribute($key) ?? $default;
    }


    public static function checkFeatureAccess($name)
    {
        switch ($name) {
            case 'ai_writer': return self::checkAIWriterAccess(); break;
            case 'ai_article_wizard': return self::checkAIArticleWizardAccess(); break;
            case 'smart_editor': return self::checkSmartEditorAccess(); break;
            case 'ai_images': return self::checkAIImagesAccess(); break;
            case 'ai_rewriter': return self::checkAIRewriterAccess(); break;
            case 'ai_voiceover': return self::checkVoiceoverAccess(); break;
            case 'voice_cloning': return self::checkVoiceCloningAccess(); break;
            case 'sound_studio': return self::checkSoundStudioAccess(); break;
            case 'ai_speech_to_text': return self::checkSpeechToTextAccess(); break;
            case 'ai_chat': return self::checkChatAccess(); break;
            case 'ai_realtime_chat': return self::checkRealtimeChatAccess(); break;
            case 'ai_vision': return self::checkVisionAccess();break;
            case 'ai_file_chat': return self::checkFileChatAccess(); break;
            case 'ai_web_chat': return self::checkWebChatAccess(); break;
            case 'ai_youtube': return self::checkYoutubeAccess(); break;
            case 'ai_rss': return self::checkRSSAccess(); break;
            case 'ai_chat_image': return self::checkChatImageAccess(); break;
            case 'ai_code': return self::checkCodeAccess(); break;
            case 'brand_voice': return self::checkBrandVoiceAccess(); break;
            case 'ai_video_image': return self::checkVideoImageAccess(); break;
            case 'ai_video_text': return self::checkVideoTextAccess(); break;
            case 'ai_video_video': return self::checkVideoVideoAccess(); break;
            case 'ai_photo_studio': return self::checkPhotoStudioAccess(); break;
            case 'ai_product_photo': return self::checkProductPhotoAccess(); break;
            case 'faceswap': return self::checkFaceswapAccess(); break;
            case 'ai_social_media': return self::checkSocialMediaAccess(); break;
            case 'ai_music': return self::checkMusicAccess(); break;
            case 'ai_textract': return self::checkTextractAccess(); break;
            case 'integration': return self::checkIntegrationAccess(); break;
            case 'ai_plagiarism_checker': return self::checkPlagiarismAccess(); break;
            case 'ai_content_detector': return self::checkContentDetectorAccess(); break;
            case 'ai_avatar': return self::checkAvatarAccess(); break;            
            case 'voice_isolator': return self::checkVoiceIsolatorAccess(); break;            
            case 'team_members': return self::checkTeamMemberAccess(); break;
            case 'subscription_plans':
            case 'affiliate_program': 
            case 'finance_management': 
            case 'finance_dashboard': 
            case 'transactions': 
            case 'subscription_plans_admin': ;
            case 'prepaid_plans': 
            case 'subscribers': 
            case 'promocodes': 
            case 'referral_system': 
            case 'referral_payouts': 
            case 'invoice_settings': 
            case 'payment_settings': return self::checkSaaSAccess(); break;
            case 'menu_builder': return self::checkMenuAccess(); break;
            default:
                return true;
                break;
        }
    }


    // AI WRITER FEATURE
    // ===================================================================================
    public static function checkAIWriterAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->writer_feature)) {
                return $plan->writer_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->writer_feature) {
                if ($settings->writer_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI ARTICLE WIZARD FEATURE
    // ===================================================================================
    public static function checkAIArticleWizardAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->wizard_feature)) {
                return $plan->wizard_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->wizard_feature) {
                if ($settings->wizard_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // SMART EDITOR FEATURE
    // ===================================================================================
    public static function checkSmartEditorAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->smart_editor_feature)) {
                return $plan->smart_editor_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->smart_editor_feature) {
                if ($settings->smart_editor_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI IMAGES FEATURE
    // ===================================================================================
    public static function checkAIImagesAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->image_feature)) {
                return $plan->image_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->images_feature) {
                if ($settings->images_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI REWRITER FEATURE
    // ===================================================================================
    public static function checkAIRewriterAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->rewriter_feature)) {
                return $plan->rewriter_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->rewriter_feature) {
                if ($settings->rewriter_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // VOICEOVER FEATURE
    // ===================================================================================
    public static function checkVoiceoverAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->voiceover_feature)) {
                return $plan->voiceover_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->voiceover_feature) {
                if ($settings->voiceover_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // VOICE CLONE FEATURE
    // ===================================================================================
    public static function checkVoiceCloningAccess()
    {   
        if (self::extensionVoiceClone()) {
            return self::checkVoiceCloneFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // SOUND STUDIO FEATURE
    // ===================================================================================
    public static function checkSoundStudioAccess()
    {   
        if (self::extensionSoundStudio()) {
            return self::checkSoundStudioFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // AI SPEECH TO TEXT FEATURE
    // ===================================================================================
    public static function checkSpeechToTextAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->transcribe_feature)) {
                return $plan->transcribe_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->transcribe_feature) {
                if ($settings->transcribe_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI CHAT FEATURE
    // ===================================================================================
    public static function checkChatAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->chat_feature)) {
                return $plan->chat_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->chat_feature) {
                if ($settings->chat_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI VISION FEATURE
    // ===================================================================================
    public static function checkVisionAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->vision_feature)) {
                return $plan->vision_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->vision_feature) {
                if ($settings->vision_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI FILE CHAT FEATURE
    // ===================================================================================
    public static function checkFileChatAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->file_chat_feature)) {
                return $plan->file_chat_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->file_chat_feature) {
                if ($settings->file_chat_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI WEB CHAT FEATURE
    // ===================================================================================
    public static function checkWebChatAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->chat_web_feature)) {
                return $plan->chat_web_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->web_chat_feature) {
                if ($settings->web_chat_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // YOUTUBE FEATURE
    // ===================================================================================
    public static function checkYoutubeAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->youtube_feature)) {
                return $plan->youtube_feature;
            } else {
                return false;
            }
        } else {
            if ($settings->youtube_feature) {
                if ($settings->youtube_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // RSS FEATURE
    // ===================================================================================
    public static function checkRSSAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->rss_feature)) {
                return $plan->rss_feature;
            } else {
                return false;
            }
        } else {
            if ($settings->rss_feature) {
                if ($settings->rss_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI IMAGE CHAT FEATURE
    // ===================================================================================
    public static function checkChatImageAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->chat_image_feature)) {
                return $plan->chat_image_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->image_chat_feature) {
                if ($settings->image_chat_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // AI CODE FEATURE
    // ===================================================================================
    public static function checkCodeAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->code_feature)) {
                return $plan->code_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->code_feature) {
                if ($settings->code_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // BRANDS FEATURE
    // ===================================================================================
    public static function checkBrandVoiceAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->brand_voice_feature)) {
                return $plan->brand_voice_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->brand_voice_feature) {
                if ($settings->brand_voice_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // REALTIME CHAT FEATURE
    // ===================================================================================
    public static function checkRealtimeChatAccess()
    {   
        if (self::extensionRealtimeChat()) {
            return self::checkRealtimeChatFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================



    // VIDEO IMAGE FEATURE
    // ===================================================================================
    public static function checkVideoImageAccess()
    {   
        if (self::extensionVideoImage()) {
            return self::checkVideoImageFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // VIDEO TEXT FEATURE
    // ===================================================================================
    public static function checkVideoTextAccess()
    {   
        if (self::extensionVideoText()) {
            return self::checkVideoTextFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // VIDEO VIDEO FEATURE
    // ===================================================================================
    public static function checkVideoVideoAccess()
    {   
        if (self::extensionVideoVideo()) {
            return self::checkVideoVideoFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // PHOTO STUDIO FEATURE
    // ===================================================================================
    public static function checkPhotoStudioAccess()
    {   
        if (self::extensionPhotoStudio()) {
            return self::checkPhotoStudioFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // PRODUCT PHOTO FEATURE
    // ===================================================================================
    public static function checkProductPhotoAccess()
    {   
        if (self::extensionPebblely()) {
            return self::checkPebblelyFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // FACESWAP FEATURE
    // ===================================================================================
    public static function checkFaceswapAccess()
    {   
        if (self::extensionFaceswap()) {
            return self::checkFaceswapFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // SOCIAL MEDIA FEATURE
    // ===================================================================================
    public static function checkSocialMediaAccess()
    {   
        if (self::extensionSocialMedia()) {
            return self::checkSocialMediaFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // MUSIC FEATURE
    // ===================================================================================
    public static function checkMusicAccess()
    {   
        if (self::extensionMusic()) {
            return self::checkMusicFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // TEXTRACT FEATURE
    // ===================================================================================
    public static function checkTextractAccess()
    {   
        if (self::extensionTextract()) {
            return self::checkTextractFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================
    

    // INTEGRATION FEATURE
    // ===================================================================================
    public static function checkIntegrationAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->integration_feature)) {
                return $plan->integration_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->integration_feature) {
                if ($settings->integration_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // PLAGIARISM FEATURE
    // ===================================================================================
    public static function checkPlagiarismAccess()
    {   
        if (self::extensionPlagiarism()) {
            return self::checkPlagiarismFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // CONTENT DETECTOR FEATURE
    // ===================================================================================
    public static function checkContentDetectorAccess()
    {   
        if (self::extensionPlagiarism()) {
            return self::checkDetectorFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // AVATAR FEATURE
    // ===================================================================================
    public static function checkAvatarAccess()
    {   
        if (self::extensionAvatar()) {
            return self::checkAvatarFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================   


    // VOICE ISOLATOR FEATURE
    // ===================================================================================
    public static function checkVoiceIsolatorAccess()
    {   
        if (self::extensionVoiceIsolator()) {
            return self::checkVoiceIsolatorFeature();
        } else {
            return false;
        }
    }
    // ===================================================================================


    // TEAM MEMBER FEATURE
    // ===================================================================================
    public static function checkTeamMemberAccess()
    {   
        $settings = MainSetting::first();

        if (!is_null(auth()->user()->plan_id)) {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->team_member_feature)) {
                return $plan->team_member_feature;
            } else {
                return false;
            }
            
        } else {
            if ($settings->team_member_feature) {
                if ($settings->team_member_feature_free_tier) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    // ===================================================================================


    // SAAS FEATURE
    // ===================================================================================
    public static function checkSaaSAccess()
    {   

        return self::extensionSaaS();

    }
    // ===================================================================================


    // MENU FEATURE
    // ===================================================================================
    public static function checkMenuAccess()
    {   

        return self::extensionMenu();

    }
    // ===================================================================================
    

    // FLUX EXTENSION
    public static function extensionFlux()
    {   
        $extension = Extension::where('slug', 'flux-pro')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // PLAGIARISM EXTENSION
    // ===================================================================================
    public static function extensionPlagiarism()
    {   
        $extension = Extension::where('slug', 'plagiarism')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkPlagiarismFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->plagiarism_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->plagiarism_feature)) {
                    return $plan->plagiarism_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->plagiarism_feature) {
                    if ($settings->plagiarism_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public static function checkDetectorFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->detector_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->ai_detector_feature)) {
                    return $plan->ai_detector_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->detector_feature) {
                    if ($settings->detector_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    // ===================================================================================


    // AI PRODUCT PHOTO EXTENSION
    // ===================================================================================
    public static function extensionPebblely()
    {   
        $extension = Extension::where('slug', 'product-photography')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkPebblelyFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->pebblely_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->product_photo_feature)) {
                    return $plan->product_photo_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->pebblely_feature) {
                    if ($settings->pebblely_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // VOICE CLONE EXTENSION
    // ===================================================================================
    public static function extensionVoiceClone()
    {   
        $extension = Extension::where('slug', 'voice-clone')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkVoiceCloneFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->voice_clone_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->voice_clone_feature)) {
                    return $plan->voice_clone_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->voice_clone_feature) {
                    if ($settings->voice_clone_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // SOUND STUDIO EXTENSION
    // ===================================================================================
    public static function extensionSoundStudio()
    {   
        $extension = Extension::where('slug', 'sound-studio')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkSoundStudioFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->sound_studio_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->sound_studio_feature)) {
                    return $plan->sound_studio_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->sound_studio_feature) {
                    if ($settings->sound_studio_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // PHOTO STUDIO EXTENSION
    // ===================================================================================
    public static function extensionPhotoStudio()
    {   
        $extension = Extension::where('slug', 'photo-studio')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkPhotoStudioFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->photo_studio_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->photo_studio_feature)) {
                    return $plan->photo_studio_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->photo_studio_feature) {
                    if ($settings->photo_studio_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // IMAGE TO VIDEO EXTENSION
    // ===================================================================================
    public static function extensionVideoImage()
    {   
        $extension = Extension::where('slug', 'video-image')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkVideoImageFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->video_image_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->video_image_feature)) {
                    return $plan->video_image_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->video_image_feature) {
                    if ($settings->video_image_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // TEXT TO VIDEO EXTENSION
    // ===================================================================================
    public static function extensionVideoText()
    {   
        $extension = Extension::where('slug', 'video-text')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkVideoTextFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->video_text_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->video_text_feature)) {
                    return $plan->video_text_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->video_text_feature) {
                    if ($settings->video_text_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // WORDPRESS INTEGRATION EXTENSION
    // ===================================================================================
    public static function extensionWordpressIntegration()
    {   
        $extension = Extension::where('slug', 'wordpress')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkWordpressIntegrationFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->integration_wordpress_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->wordpress_feature)) {
                    return $plan->wordpress_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->integration_wordpress_feature) {
                    if ($settings->integration_wordpress_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // AI PRODUCT PHOTO EXTENSION
    // ===================================================================================
    public static function extensionAvatar()
    {   
        $extension = Extension::where('slug', 'avatar')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkAvatarFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->heygen_avatar_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->avatar_feature)) {
                    return $plan->avatar_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->heygen_avatar_feature) {
                    if ($settings->heygen_avatar_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // AI VOICE ISOLATOR EXTENSION
    // ===================================================================================
    public static function extensionVoiceIsolator()
    {   
        $extension = Extension::where('slug', 'voice-isolator')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkVoiceIsolatorFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->voice_isolator_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->voice_isolator_feature)) {
                    return $plan->voice_isolator_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->voice_isolator_feature) {
                    if ($settings->voice_isolator_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // SAAS EXTENSION
    // ===================================================================================
    public static function extensionCheckSaaS()
    {   
        $extension = Extension::where('slug', 'saas')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    
    public static function extensionSaaS()
    {   
        $extension = Extension::where('slug', 'saas')->first();
        $settings = ExtensionSetting::first();

        if ($extension) {
            if ($extension->installed) {
                if (isset($settings->saas_feature)) {
                    if ($settings->saas_feature) {
                        return true;                        
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // ===================================================================================


    // AI SOCIAL MEDIA EXTENSION
    // ===================================================================================
    public static function extensionSocialMedia()
    {   
 
        $extension = Extension::where('slug', 'social-media')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkSocialMediaFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->social_media_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->social_media_feature)) {
                    return $plan->social_media_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->social_media_feature) {
                    if ($settings->social_media_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // VIDEO TO VIDEO EXTENSION
    // ===================================================================================
    public static function extensionVideoVideo()
    {   
        $extension = Extension::where('slug', 'video-video')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkVideoVideoFeature()
    {   

        $settings = ExtensionSetting::first();

        if (isset($settings->video_video_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->video_video_feature)) {
                    return $plan->video_video_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->video_video_feature) {
                    if ($settings->video_video_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // MAINTENANCE EXTENSION
    // ===================================================================================
    public static function extensionMaintenance()
    {   
        $extension = Extension::where('slug', 'maintenance')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // MIDJOURNEY EXTENSION
    // ===================================================================================
    public static function extensionMidjourney()
    {   
        $extension = Extension::where('slug', 'midjourney')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // FACESWAP EXTENSION
    // ===================================================================================
    public static function extensionFaceswap()
    {   
        $extension = Extension::where('slug', 'faceswap')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkFaceswapFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->faceswap_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->faceswap_feature)) {
                    return $plan->faceswap_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->faceswap_feature) {
                    if ($settings->faceswap_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // MUSIC EXTENSION
    // ===================================================================================
    public static function extensionMusic()
    {   
        $extension = Extension::where('slug', 'music')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkMusicFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->music_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->music_feature)) {
                    return $plan->music_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->music_feature) {
                    if ($settings->music_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // SEO EXTENSION
    // ===================================================================================
    public static function extensionSEO()
    {   
        $extension = Extension::where('slug', 'seo')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkSEOFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->seo_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->seo_feature)) {
                    return $plan->seo_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->seo_feature) {
                    if ($settings->seo_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // MENU EXTENSION
    // ===================================================================================
    public static function extensionMenu()
    {   
        $extension = Extension::where('slug', 'menu')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // IBM WATSON EXTENSION
    // ===================================================================================
    public static function extensionWatson()
    {   
        $extension = Extension::where('slug', 'watson')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // CLIPDROP EXTENSION
    // ===================================================================================
    public static function extensionClipdrop()
    {   
        $extension = Extension::where('slug', 'clipdrop')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // HUBSPOT EXTENSION
    // ===================================================================================
    public static function extensionHubspot()
    {   
        $extension = Extension::where('slug', 'hubspot')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // MAILCHIMP EXTENSION
    // ===================================================================================
    public static function extensionMailchimp()
    {   
        $extension = Extension::where('slug', 'mailchimp')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // CHAT SHARE EXTENSION
    // ===================================================================================
    public static function extensionChatShare()
    {   

        $extension = Extension::where('slug', 'chat-share')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkChatShareFeature()
    {   

        $settings = ExtensionSetting::first();

        if (isset($settings->chat_share_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->chat_share_feature)) {
                    return $plan->chat_share_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->chat_share_feature) {
                    if ($settings->chat_share_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // PERPLEXITY AI EXTENSION
    // ===================================================================================
    public static function extensionPerplexity()
    {   
        $extension = Extension::where('slug', 'perplexity')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }
    // ===================================================================================


    // AI TEXTRACT EXTENSION
    // ===================================================================================
    public static function extensionTextract()
    {   
        $extension = Extension::where('slug', 'textract')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkTextractFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->textract_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->textract_feature)) {
                    return $plan->textract_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->textract_feature) {
                    if ($settings->textract_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // AI REALTIME CHAT EXTENSION
    // ===================================================================================
    public static function extensionRealtimeChat()
    {   
        $extension = Extension::where('slug', 'realtime-chat')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkRealtimeChatFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->chat_realtime_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->chat_realtime_feature)) {
                    return $plan->chat_realtime_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->chat_realtime_feature) {
                    if ($settings->chat_realtime_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    // EXTERNAL CHATBOT EXTENSION
    // ===================================================================================
    public static function extensionExternalChatbot()
    {   
        $extension = Extension::where('slug', 'external-chatbot')->first();

        if ($extension) {
            return ($extension->installed) ? true : false;
        } else {
            return false;
        }
    }

    public static function checkExternalChatbotFeature()
    {   
        $settings = ExtensionSetting::first();

        if (isset($settings->chatbot_external_feature)) {
            if (!is_null(auth()->user()->plan_id)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if (!is_null($plan->chatbot_external_feature)) {
                    return $plan->chatbot_external_feature;
                } else {
                    return false;
                }
            } else {
                if ($settings->chatbot_external_feature) {
                    if ($settings->chatbot_external_free_tier) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }  
    }
    // ===================================================================================


    
}



