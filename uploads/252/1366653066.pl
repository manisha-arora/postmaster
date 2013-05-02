system("clear");
print "\n\n\n\t\t\t\t\t\t" . "^"x50 . "\n" ;
print "\n\t\t\t\t\t\t\t\t  DELETE ITEM";
print "\n\t\t\t\t\t\t"  . "^"x50 . "\n\n";
print "\n\t\t\t" . "---"x30 . "\n";    
print " "x50 . "1";
print "\t Press1 for deleteitem in starters \n"; 
print " "x50 . "2";
print "\t Press2 for deleteitem in Punjabi Tadka \n"; 
print " "x50 . "3";
print "\t Press3 for deleteitem in Chineese \n"; 
print " "x50 . "4";
print "\t Press4 for deleteitem in South indian \n"; 
print " "x50 . "5";
print "\t Press5 for deleteitem in Italian \n"; 
print "\n\t\t\t" . "---"x30 ."\n";    
print "\t\t\t 	ENTER YOUR CHOICE:";
chop($choice=<stdin>);
if($choice eq '1')
{
open(f1,"starter");
@arr=<f1>;
print "\n \t which code u want to delete:";
chop($entry=<stdin>);
@s=grep(/$entry/,@arr);
$a1=@s;
print $a1;
if($a1<=0)
{
print " \n\t\t Record  not exist: ";
exit;
}
else
{
close(f1);
open(f1,"starter");
while(<f1>)
{
@arr=split(/\ | /);
chop($arr[0]);
if($entry==$arr[0])
{
}
}
print $arr[0];
print("r u sure u want to delete:y/n  \n");
$ch=<stdin>;
chop($ch);
if($ch eq 'y')
{
system("grep -v $entry starter|cut -d '|' -f1-4> start");
system("mv start starter");
print("record deleted  \n");
}
else
{
exit;
}
}
print "\n\t\t Do u want to continue:";
print "\n\t\t press y to delete item:";
chop($ch=<stdin>); 
if($ch eq 'y')
{
system("perl delitem.pl");
}
else
{
system("perl main.pl");
}
}
elsif($choice eq '2')
{
open(f1,"pun");
@arr=<f1>;
print "\n \t which code u want to delete:";
chop($entry=<stdin>);
@s=grep(/$entry/,@arr);
$a1=@s;
print $a1;
if($a1<=0)
{
print " \n\t\t Record  not exist: ";
exit;
}
else
{
close(f1);
open(f1,"pun");
while(<f1>)
{
@arr=split(/\ | /);
chop($arr[0]);
if($entry==$arr[0])
{
}
}
print("r u sure u want to delete:y/n \n");
$ch=<stdin>;
chop($ch);
if($ch eq 'y')
{
system("grep -v $entry pun|cut -d '|' -f1-4> p");
system("mv p pun");
print("record deleted  \n");
}
else
{
exit;
}
}
print "\n\t\t Do u want to continue:";
print "\n\t\t press y to delete item:";
chop($ch=<stdin>); 
if($ch eq 'y')
{
system("perl delitem.pl");
}
else
{
system("perl main.pl");
}
}
elsif($choice eq '3')
{
open(f1,"chi");
@arr=<f1>;
print "\n \t which code u want to delete:";
chop($entry=<stdin>);
@s=grep(/$entry/,@arr);
$a1=@s;
print $a1;
if($a1<=0)
{
print " \n\t\t Record  not exist: ";
exit;
}
else
{
close(f1);
open(f1,"chi");
while(<f1>)
{
@arr=split(/\ | /);
chop($arr[0]);
if($entry==$arr[0])
{
}
}
print("r u sure u want to delete:y/n \n");
$ch=<stdin>;
chop($ch);
if($ch eq 'y')
{
system("grep -v $entry chi|cut -d '|' -f1-4> c");
system("mv c chi");
print("record deleted  \n");
}
else
{
exit;
}
}
print "\n\t\t Do u want to continue:";
print "\n\t\t press y to delete item:";
chop($ch=<stdin>); 
if($ch eq 'y')
{
system("perl delitem.pl");
}
else
{
system("perl main.pl");
}
}
elsif($choice eq '4')
{
open(f1,"south");
@arr=<f1>;
print "\n \t which code u want to delete:";
chop($entry=<stdin>);
@s=grep(/$entry/,@arr);
$a1=@s;
print $a1;
if($a1<=0)
{
print " \n\t\t Record  not exist ";
exit;
}
else
{
close(f1);
open(f1,"south");
while(<f1>)
{
@arr=split(/\ | /);
chop($arr[0]);
if($entry==$arr[0])
{
}
}
print("r u sure u want to delete:y \n");
$ch=<stdin>;
chop($ch);
if($ch eq 'y')
{
system("grep -v $entry south|cut -d '|' -f1-4> s");
system("mv c south");
print("record deleted  \n");
}
else
{
exit;
}
}
print "\n\t\t Do u want to continue:";
print "\n\t\t press y to delete item:";
chop($ch=<stdin>); 
if($ch eq 'y')
{
system("perl delitem.pl");
}
else
{
system("perl main.pl");
}
}
elsif($choice eq '5')
{
open(f1,"ital");
@arr=<f1>;
print "\n \t which code u want to delete:";
chop($entry=<stdin>);
@s=grep(/$entry/,@arr);
$a1=@s;
print $a1;
if($a1<=0)
{
print " \n\t\t Record  not exist ";
exit;
}
else
{
close(f1);
open(f1,"ital");
while(<f1>)
{
@arr=split(/\ | /);
chop($arr[0]);
if($entry==$arr[0])
{
}
}
print("r u sure u want to delete:y \n");
$ch=<stdin>;
chop($ch);
if($ch eq 'y')
{
system("grep -v $entry ital|cut -d '|' -f1-4> i");
system("mv i ital");
print("record deleted  \n");
}
else
{
exit;
}
}
print "\n\t\t Do u want to continue:";
print "\n\t\t press y to delete item:";
chop($ch=<stdin>); 
if($ch eq 'y')
{
system("perl delitem.pl");
}
else
{
system("perl main.pl");
}
}
