import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.sql.*;
class delete extends JFrame implements ActionListener
{ 
JLabel l1,l2;
JTextField t1;
JButton b2,b3;
Font f,f1;
delete()
{
Color c=new Color(100,10,10);
Color c1=new Color(0,100,100);
getContentPane().setBackground(c);
getContentPane().setLayout(null);
Font f2=new Font("times new roman",Font.BOLD,25);
l2=new JLabel("DELETE");
l1=new JLabel("Phone No");
t1=new JTextField(20);
b2=new JButton("DELETE");
b3=new JButton("BACK");
l1.setForeground(Color.white);
l2.setForeground(Color.white);
b2.setFont(f2);
b2.setForeground(c1);
b3.setFont(f2);
b3.setForeground(c1);
f=new Font("times new roman",Font.BOLD,38);
f1=new Font("times new roman",Font.BOLD,60);
l1.setFont(f);
l2.setFont(f1);
b2.setBounds(295,400,140,30);
b3.setBounds(450,400,140,30);
l2.setBounds(290,100,300,70);
l1.setBounds(200,220,200,100);
t1.setBounds(450,260,165,30);
add(l2);
add(l1);
add(t1);
add(b2);
add(b3);
b2.addActionListener(this);
b3.addActionListener(this);
setTitle("DELETE");
setSize(1200,1400);
setVisible(true);
setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
public void actionPerformed(ActionEvent ae)
{
if(ae.getSource()==b3)
{
buy b1=new buy();
}
else if(ae.getSource()==b2)
{
try
{
Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
Connection c=DriverManager.getConnection("jdbc:odbc:MYDSN");
PreparedStatement s=c.prepareStatement("DELETE FROM entry WHERE Phoneno=?");
s.setString(1,(t1.getText()));
//s.setString(1,t1.getText());
//s.setString(2,tdest.getText());
s.executeUpdate();
t1.setText("");
}
catch(Exception e3)		
{
System.out.println(e3);
}
}
}
public static void main(String args[])
{
delete s=new delete();
s.setTitle("DELETE");
s.setSize(1200,1400);
s.setVisible(true);
s.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
}
