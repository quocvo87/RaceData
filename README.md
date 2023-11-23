| 1. Introduction
----------------
    1.1 What is RaceData
        + Firstly, I would like to say for you RaceData difference RaceCondition. This course will tall about RaceData. RaceCondition will disscuss at another

        + What is RaceData: When multiple process are called to process and they use same CriticalRegion so can process1, process2 or ... processN get CriticalRegion but that's not last value.
            Exp: Your account has balace $100.000
                + Step1: You open Chrome browser and login on it, and you open Transfer form to accountA with $100.000.
                + Step2: You open Firefox browser and login on it, and you open Transfer form to accountA with $100.000 same.
                + Step3: You will make money transfers at the same time from both browers above.
                + Step4: Go to accountA and check balance, wowww, supprise if lucky you will get $200.000
                => That's RaceData

    1.2 Preventing RaceData
 


| 2. Directory Struct
-----------------------

    Root
    |__data
    |   |__employee.json -- example data
    |
    |__src
    |   |__MatualExclusion -- this class prevent RaceData
    |       |__MatualExclusion.php
    |       |__SumMatualExclusion.php
    |
    |__composer.json - package dependency
    |__index.php - Run to test update: adding 50.000 into employee.json/amount after each run
    |
    |__index1.php
    |__index2.php - Run index1.php & index2.php at the same time to see RaceData issue
    |
    |__index3.php
    |__index4.php - Run index3.php & index4.php at the same time to see you won't been RaceData issue


-----------------------


| 3. Step by step do it
-----------------------

    3.1 Clone/download RaceData folder to your computer
        3.1.1 Download from browser
            3.1.1.1 Goto RaceData folder > D:\YourFolder\RaceData
            3.1.1.2 Run composer: composer install
            3.1.1.3 Open D:\YourFolder\RaceData\data\employee.json
                {"id":10,"name":"TrueMe","amount":1000.000}

            3.1.1.4 Run for test D:\YourFolder\RaceData\index.php
                + First: you will see
                    D:\Projects\test\RaceData\index.php:6:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1000000
                    D:\Projects\test\RaceData\index.php:13:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1050000

                + Second: you will see
                    D:\Projects\test\RaceData\index.php:6:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1050000
                    D:\Projects\test\RaceData\index.php:13:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1100000
                + Last amount: 1.100.000

            3.1.1.5 Run for test D:\YourFolder\RaceData\index1.php && index2.php at the same time
                + index1.php
                    D:\Projects\test\RaceData\index1.php:8:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1100000
                    D:\Projects\test\RaceData\index1.php:16:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1150000

                + index2.php
                    D:\Projects\test\RaceData\index2.php:8:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1100000
                    D:\Projects\test\RaceData\index2.php:16:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1150000
                + Last amount: 1.150.000 => wrong value. Because of 1.200.000 is expected value

            3.1.1.6 Run for test D:\YourFolder\RaceData\index3.php && index4.php at the same time
                + index3.php
                    D:\Projects\test\RaceData\index3.php:11:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1150000
                    D:\Projects\test\RaceData\index3.php:21:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1200000

                + index4.php
                    D:\Projects\test\RaceData\index4.php:11:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1150000
                    D:\Projects\test\RaceData\index4.php:20:
                    array (size=3)
                      'id' => int 10
                      'name' => string 'TrueMe' (length=6)
                      'amount' => int 1250000

                + Last amount: 1.250.000 => this is expected value, when you use index3.php && index4.php so that prevent RaceData

-----------------------



