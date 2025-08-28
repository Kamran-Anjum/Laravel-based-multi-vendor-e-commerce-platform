
Dear, {{ $rider_details['name'] }} <br><br>

Congratulations! <br><br>

Your account has been registered successfully with Lilac2xpress. Now You have to activate your account by click the following link: <br><br>

<a href="{{ url( Session::get('lang').'/rider/account/activate/'.$rider_details['user_id']  ) }}">ACTIVATE</a>

<p>Thanks for choosing us!</p>

<p>Regards</p>

<p>Lilac2xpress Team</p>
