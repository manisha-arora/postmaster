system("clear");
print "\n\n\n\n\n\n\n\n\n\n" .  " "x38 ."****"x12;
print"\n ". " "x37 ."****"x12;
print"\n". " "x38  ."*"x2;
print" "x44  ."*"x2;
print"\n". " "x38  ."*"x2;
print" "x44  ."*"x2;
print"\n"." "x38 ."*"x2 . " "x15 ."WELCOME". " "x22 . "*"x2;
print"\n"." "x38 ."*"x2 . " "x17 ." TO ". " "x23 . "*"x2;
print"\n"." "x38 ."*"x2 . " "x8 ."RESTAURANT MANAGEMENT SYSTEM". " "x8 . "*"x2;
print " "x37  ."*"x2;
print " "x38  ."*"x2;
print " "x44  ."*"x2;
print"\n". " "x38 ."****"x12;
print"\n". " "x38 ."****"x12;
print "\n\n\n" .  " "x50 ."-"x10;
print"\n ". " "x49 ."|"x1 . "  login  "  . "|"x1;
print "\n" .  " "x50 ."-"x10;
print "\n";
print "\n\n Enter y to continue:";
chop($ch=<stdin>);
if($ch eq 'y')
{ 
system("perl login2.pl");
}
else
{
exit;
}
