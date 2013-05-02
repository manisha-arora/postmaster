system("clear");
print "\n\n\n\t\t\t\t\t\t" . "^"x50 . "\n" ;
print "\n\t\t\t\t\t\t\t\t MODIFY FORM";
print "\n\t\t\t\t\t\t"  . "^"x50 . "\n\n";
print "\n\t\t\t" . "---"x30 . "\n";    
print " "x50 . "1";
print "\t Press1 for Modify item in starters \n"; 
print " "x50 . "2";
print "\t Press2 for Modify item in Punjabi Tadka \n"; 
print " "x50 . "3";
print "\t Press3 for Modify item in Chineese \n"; 
print " "x50 . "4";
print "\t Press4 for Modify item in South indian \n"; 
print " "x50 . "5";
print "\t Press5 for Modify item in Italian \n"; 
print "\n\t\t\t" . "---"x30 ."\n";    
print "\t\t\t 	ENTER YOUR CHOICE:";
chop($choice=<stdin>);
print "\n\t\t\t\t\t\t"  . "^"x50 . "\n\n";
print " "x50 . "Modify Records" . "\n";
print "\n\t\t\t\t\t\t"  . "^"x50 . "\n\n";
if($choice eq '1')
{
p:
print "\n\t\t\t\t Enter code:";
open(f1,"starter");
chop($code=<stdin>);
@a1=<f1>;
@s=grep(/$code/,@a1);
$c=@s;
if($c<=0)
{
close(f1);
print("record does no exist");
goto p;
}
close(f1);
open(f1,"starter");
while(<f1>)
{
@a1=split(/\|/);
if($code == $a1[0])
{
print @a1;
print("do u want to change item name: \n");
print("press y/n \n");
chop($ch=<stdin>);
if($ch eq 'y')
{
chop($itemname=<stdin>);
}
else
{
$itemname =$a1[1];
}
print("do u want to change price: \n");
print("press y/n: \n");
chop($a=<stdin>);
if($a eq 'y')
{
chop($price=<stdin>);
}
else
{
$price=$a1[2];
}
system("grep -v $code starter | cut -d '|' -f1-4 > t");
system("mv t starter");
close(f1);
open(f2,">>starter");
print(f2"$code\t |$itemname \t |$price \t");
print("record has been modified \n");
close(f2);
}
}
print("\n\t\t Do u want to continue:");
print("\n\t\t Press y/n");
chop($e=<stdin>);
if($e eq 'y')
{
system("perl mb.pl");
}
else
{
system("perl menu.pl");
}
}
if($choice eq '2')
{
p:
print "\n\t\t\t\t Enter code:";
open(f1,"pun");
chop($code=<stdin>);
@a1=<f1>;
#print @a1;
@s=grep(/$code/,@a1);
$c=@s;
if($c<=0)
{
close(f1);
print("record does no exist");
goto p;
}
close(f1);
open(f1,"pun");
while(<f1>)
{
@a1=split(/\|/);
if($code == $a1[0])
{
print @a1;
print("do u want to change item name: \n");
print("press y/n \n");
chop($ch=<stdin>);
if($ch eq 'y')
{
chop($itemname=<stdin>);
}
else
{
$itemname =$a1[1];
}
print("do u want to change price: \n");
print("press y/n: \n");
chop($a=<stdin>);
if($a eq 'y')
{
chop($price=<stdin>);
}
else
{
$price=$a1[2];
}
system("grep -v $code pun | cut -d '|' -f1-4 > t");
system("mv t pun");
close(f1);
open(f2,">>pun");
print(f2"$code\t |$itemname \t |$price \t");
print("record has been modified \n");
close(f2);
}
}
print("\n\t\t Do u want to continue:");
print("\n\t\t Press y/n");
chop($e=<stdin>);
if($e eq 'y')
{
system("perl mb.pl");
}
else
{
system("perl menu.pl");
}
}
if($choice eq '3')
{
p:
print "\n\t\t\t\t Enter code:";
open(f1,"chi");
chop($code=<stdin>);
@a1=<f1>;
#print @a1;
@s=grep(/$code/,@a1);
$c=@s;
if($c<=0)
{
close(f1);
print("record does no exist");
goto p;
}
close(f1);
open(f1,"chi");
while(<f1>)
{
@a1=split(/\|/);
if($code == $a1[0])
{
print @a1;
print("do u want to change item name: \n");
print("press y/n \n");
chop($ch=<stdin>);
if($ch eq 'y')
{
chop($itemname=<stdin>);
}
else
{
$itemname =$a1[1];
}
print("do u want to change price: \n");
print("press y/n: \n");
chop($a=<stdin>);
if($a eq 'y')
{
chop($price=<stdin>);
}
else
{
$price=$a1[2];
}
system("grep -v $code chi | cut -d '|' -f1-4 > t");
system("mv t chi");
close(f1);
open(f2,">>chi");
print(f2"$code\t |$itemname \t |$price \t");
print("record has been modified \n");
close(f2);
}
}
print("\n\t\t Do u want to continue:");
print("\n\t\t Press y/n");
chop($e=<stdin>);
if($e eq 'y')
{
system("perl mb.pl");
}
else
{
system("perl menu.pl");
}
}
if($choice eq '4')
{
p:
print "\n\t\t\t\t Enter code:";
open(f1,"south");
chop($code=<stdin>);
@a1=<f1>;
#print @a1;
@s=grep(/$code/,@a1);
$c=@s;
if($c<=0)
{
close(f1);
print("record does no exist");
goto p;
}
close(f1);
open(f1,"south");
while(<f1>)
{
@a1=split(/\|/);
if($code == $a1[0])
{
print @a1;
print("do u want to change item name: \n");
print("press y/n \n");
chop($ch=<stdin>);
if($ch eq 'y')
{
chop($itemname=<stdin>);
}
else
{
$itemname =$a1[1];
}
print("do u want to change price: \n");
print("press y/n: \n");
chop($a=<stdin>);
if($a eq 'y')
{
chop($price=<stdin>);
}
else
{
$price=$a1[2];
}
system("grep -v $code south | cut -d '|' -f1-4 > t");
system("mv t south");
close(f1);
open(f2,">>south");
print(f2"$code\t |$itemname \t |$price \t");
print("record has been modified \n");
close(f2);
}
}
print("\n\t\t Do u want to continue:");
print("\n\t\t Press y/n");
chop($e=<stdin>);
if($e eq 'y')
{
system("perl mb.pl");
}
else
{
system("perl menu.pl");
}
}

if($choice eq '5')
{
p:
print "\n\t\t\t\t Enter code:";
open(f1,"ital");
chop($code=<stdin>);
@a1=<f1>;
#print @a1;
@s=grep(/$code/,@a1);
$c=@s;
if($c<=0)
{
close(f1);
print("record does no exist");
goto p;
}
close(f1);
open(f1,"ital");
while(<f1>)
{
@a1=split(/\|/);
if($code == $a1[0])
{
print @a1;
print("do u want to change item name: \n");
print("press y/n \n");
chop($ch=<stdin>);
if($ch eq 'y')
{
chop($itemname=<stdin>);
}
else
{
$itemname =$a1[1];
}
print("do u want to change price: \n");
print("press y/n: \n");
chop($a=<stdin>);
if($a eq 'y')
{
chop($price=<stdin>);
}
else
{
$price=$a1[2];
}
system("grep -v $code ital | cut -d '|' -f1-4 > t");
system("mv t ital");
close(f1);
open(f2,">>ital");
print(f2"$code\t |$itemname \t |$price \t");
print("record has been modified \n");
close(f2);
}
}
print("\n\t\t Do u want to continue:");
print("\n\t\t Press y/n");
chop($e=<stdin>);
if($e eq 'y')
{
system("perl mb.pl");
}
else
{
system("perl menu.pl");
}
}
