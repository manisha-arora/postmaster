import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.sql.*;
class update extends JFrame implements ActionListener
{
JLabel l1,l2;
JTextField t1;
JButton b2;
Font f,f1;
update()
{
Color c=new Color(100,10,10);
Color c1=new Color(0,100,100);
getContentPane().setBackground(c);
getContentPane().setLayout(null);
l2=new JLabel("UPDATE");
l1=new JLabel("NAME");
t1=new JTextField(20);
b2=new JButton("UPDATE");
l1.setForeground(Color.white);
l2.setForeground(Color.white);
b2.setForeground(c1);
f=new Font("times new roman",Font.BOLD,38);
f1=new Font("times new roman",Font.BOLD,60);
l1.setFont(f);
l2.setFont(f1);
b2.setBounds(295,400,140,30);
l2.setBounds(290,100,300,70);
l1.setBounds(240,220,200,100);
t1.setBounds(450,260,165,30);
add(l2);
add(l1);
add(t1);
add(b2);
b2.addActionListener(this);
setTitle("UPDATE");
setSize(1200,1400);
setVisible(true);
setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
public void actionPerformed(ActionEvent ae)
{
if(ae.getSource()==b2)

}
}
public static void main(String args[])
{
update s=new update();
s.setTitle("UPDATE");
s.setSize(1200,1400);
s.setVisible(true);
s.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
}
}
