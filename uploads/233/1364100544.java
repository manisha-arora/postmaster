import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.sql.*;
class buy extends JFrame implements   ItemListener, ActionListener
{
JLabel l1 ,l10,l3,l4,l5,l6,l7,l8;
JTextField t1,t3,t6;
JRadioButton r1,r2;
JComboBox cb,cb1;
ButtonGroup payment;
JTextArea tx1;
JButton b1,b2,b3,b4;
Font f,f1,f2;
public buy()
{
Color c=new Color(100,10,10);
Color c1=new Color(0,100,100);
getContentPane().setBackground(Color.black);
getContentPane().setLayout(null);
l1=new JLabel("Name");
l3=new JLabel("Address");
l4=new JLabel("Phone No");
l5=new JLabel("City");
l6=new JLabel("State");
l7=new JLabel("Mode of payment");
l8=new JLabel("Account No");
l10=new JLabel("BUY FORM");
f=new Font("times new roman",Font.BOLD,26);
f1=new Font("times new roman",Font.BOLD,20);
f2=new Font("times new roman",Font.BOLD,17);
l10.setFont(f);
l10.setForeground(Color.red);
l1.setFont(f1);
l1.setForeground(Color.white);
l3.setFont(f1);
l3.setForeground(Color.white);
l4.setFont(f1);
l4.setForeground(Color.white);
l5.setFont(f1);
l5.setForeground(Color.white);
l6.setFont(f1);
l6.setForeground(Color.white);
l7.setFont(f1);
l7.setForeground(Color.white);
l8.setFont(f1);
l8.setForeground(Color.white);
b1=new JButton("ADD");
b2=new JButton("DELETE");
b3=new JButton("UPDATE");
b4=new JButton("BACK");
t1=new JTextField(20);
t3=new JTextField(50);
cb=new JComboBox();
cb1=new JComboBox();
t6=new JTextField(20);
tx1=new JTextArea(5,7);
r1=new JRadioButton("Credit");
r2=new JRadioButton("Cash");
payment= new ButtonGroup(); 
b1.setBackground(c);
b1.setForeground(Color.white);
b1.setFont(f2);
b2.setBackground(c);
b2.setForeground(Color.white);
b2.setFont(f2);
b3.setBackground(c);
b3.setForeground(Color.white);
b3.setFont(f2);
r1.setBackground(c1);
r1.setForeground(Color.white);
r1.setFont(f2);
r2.setBackground(c1);
r2.setForeground(Color.white);
r2.setFont(f2);
b4.setForeground(Color.white);
b4.setFont(f1);
b4.setBackground(c1);
add(l10);
add(l1);
add(t1);
add(l3);
add(tx1);
add(l4);
add(t3);
add(l5);
add(cb1);
add(l6);
add(l7);
payment.add(r1);
payment.add(r2);
cb.addItem("Punjab");
cb.addItem("Haryana");
cb.addItem("Jammu");
cb.addItem("Rajasthan");
cb.addItem("Gujrat");
cb.addItem("Himachal Pardesh");
cb.addItem("Madhya Pradesh");
cb.addItem("Maharashtra");
cb.addItem("Goa");
cb.addItem("West Bengal");
cb1.addItem("Ludhiana");
cb1.addItem("Chandigarh");
cb1.addItem("Srinagar");
cb1.addItem("Jaipur");
cb1.addItem("Ahmedabad");
cb1.addItem("Shimla");
cb1.addItem("Indore");
cb1.addItem("Mumbai");
cb1.addItem("Panaji");
cb1.addItem("Kolkata");
add(l8);
add(t6);
add(cb);
add(b1);
add(b2);
add(b3);
add(r1);
add(r2);
add(b4);
l10.setBounds(150,20,270,80);
l1.setBounds(80,90,70,60);
t1.setBounds(206,106,145,20);
l3.setBounds(80,130,70,60);
tx1.setBounds(206,150,145,70);
l4.setBounds(80,217,110,60);
t3.setBounds(206,240,145,20);
l5.setBounds(80,260,70,60);
cb1.setBounds(206,284,145,20);
l6.setBounds(80,305,70,60);
cb.setBounds(206,328,145,20);
l7.setBounds(40,350,160,60);
r1.setBounds(206,370,90,20);
r2.setBounds(315,370,90,20);
l8.setBounds(80,395,110,60);
t6.setBounds(206,416,145,20);
b1.setBounds(80,490,100,30);
b2.setBounds(215,490,100,30);
b3.setBounds(350,490,110,30);
b4.setBounds(300,570,100,30);
b4.addActionListener(this);
b2.addActionListener(this);
b3.addActionListener(this);
b1.addActionListener(this);
r1. addItemListener(this);
r2.addItemListener(this);
setTitle("Buy Form");
setSize(1200,1400);
setVisible(true);
setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
public void itemStateChanged(ItemEvent ae)
{
if(r1.isSelected()==true)
{
t6.setEditable(true);
}
else
{

t6.setEditable(false);
}
}

public void actionPerformed(ActionEvent ae)
{
if(ae.getSource()==b1)
{
try
{
Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
Connection c=DriverManager.getConnection("jdbc:odbc:MYDSN");
PreparedStatement s=c.prepareStatement("INSERT INTO entry VALUES(?,?,?,?,?,?,?)");
ResultSet rs;
s.setString(1,t1.getText());
s.setString(2,tx1.getText());
s.setInt(3,Integer.parseInt(t3.getText()));
s.setString(4,cb.getSelectedItem().toString());
s.setString(5,cb1.getSelectedItem().toString());
//s.setInt(6,Integer.parseInt(payment.getSelectedItem().toString()));

//s.setInt(6,Integer.parseInt(r2.getSelectedItem().toString()));
//s.setInt(7,Integer.parseInt(t6.getText()));

if(r1.isSelected()==true)
{
s.setString(6,"credit");
s.setString(7,t6.getText());
}
else
{
s.setString(6,"cash");
s.setString(7,"");
}
s.executeUpdate();
	t1.setText("");
	tx1.setText("");
	t3.setText("");		
	//cb.setText("");
	//cb1.setText("");
	t6.setText("");
	//t7.setText("");
 	//t8.setText("");

/*if(r1.isSelected()==true)
{
s.setString(6,"credit");
s.setString(9,t6.getText());

}
else
{
s.setString(7,"cash");
//s.setString(,"");
}
s.executeQuery();*/
}
catch(Exception e1)		
{
System.out.println(e1);
}
}
else if(ae.getSource()==b4)
{
home h1=new home();
}
else if(ae.getSource()==b2)
{
delete d1=new delete();
}
else if(ae.getSource()==b3)
{
try
{
Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
Connection c=DriverManager.getConnection("jdbc:odbc:MYDSN");
PreparedStatement s=c.prepareStatement("UPDATE entry  SET Name =?,Address=?,City=?,State=?,Payment=?,CNo=? WHERE  Phoneno=?");
s.setString(1,(t1.getText()));
s.setString(2,tx1.getText());
s.setString(3,cb.getSelectedItem().toString());
s.setString(4,cb1.getSelectedItem().toString());
if(r1.isSelected()==true)
{
s.setString(5,"credit");
s.setString(6,t6.getText());

}
else
{
s.setString(5,"cash");
s.setString(6,"");
}
s.setInt(7,Integer.parseInt(t3.getText()));
s.executeUpdate();
t1.setText("");

	tx1.setText("");
	t3.setText("");		
	cb.setSelectedIndex(0);
	cb1.setSelectedIndex(0);
	
	t6.setText("");
	//t7.setText("");
 	//t8.setText("");
}
catch(Exception e2)		
{
System.out.println(e2);
}
}
else
{
setVisible(false);
}
}
/*public static void main(String args[])
{
buy s=new buy();
s.setTitle("buy form");
s.setSize(1200,1400);
s.setVisible(true);
s.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}*/
}