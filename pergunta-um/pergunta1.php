for ($var = 1; $var < 101; $var++) {
    if(($var % 3) == 0 && ($var % 5) == 0)
    {
        print("FizzBuzz \n");
    } elseif($var % 5 == 0 )
    {
        print("Buzz \n");
    }elseif($var % 3 == 0 )
    {
        print("Fizz \n");
    }else
    {
        print("$var \n");
    }
}