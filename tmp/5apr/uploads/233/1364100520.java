import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
class customer extends JFrame implements ActionListener 
{
JLabel l1,l2,l3;
JButton b1;
Color c;
Font f,f2;
public customer()
{
c=new Color(100,10,10);
Color c3=new Color(0,100,100);
getContentPane().setBackground(c);
getContentPane().setLayout(null);
Color c1=new Color(0,100,100);
l1=new JLabel("Thanks");
l2=new JLabel("For");
l3=new JLabel("Visiting");
b1=new JButton("BACK");
f=new Font("times new roman",Font.ITALIC,130);      
f2=new Font("times new roman",Font.BOLD,25);
l1.setForeground(Color.white);
l2.setForeground(Color.white);
l3.setForeground(Color.white);
b1.setForeground(Color.white);
b1.setBackground(c1);
l1.setFont(f);
l2.setFont(f);
l3.setFont(f);
b1.setFont(f2);
add(l1);
add(l2);
add(l3);
add(b1);
l1.setBounds(300,60,900,130);
l2.setBounds(400,220,900,130);
l3.setBounds(300,370,1060,160);
b1.setBounds(400,560,140,30);
b1.addActionListener(this);
setTitle("Customer Care");
setSize(1200,1400);
setVisible(true);
setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
public void actionPerformed(ActionEvent ae)
{
if(ae.getSource()==b1)
{
home h1=new home();
}
else
{
setVisible(false);
}
}
/*public static void main(String args[])
{
customer s=new customer();
s.setTitle("Customer Care");
s.setSize(1200,1400);
s.setVisible(true);
s.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}*/
}