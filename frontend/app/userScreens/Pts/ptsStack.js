import React from 'react';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import PhysiotherapistsScreen from './pts';
import ChatScreen from './chat';

const Stack = createNativeStackNavigator();

const PhysiotherapistsStack = () => {
  return (
    <Stack.Navigator>
      <Stack.Screen name="Physiotherapists" component={PhysiotherapistsScreen} />
      <Stack.Screen name="Chat" component={ChatScreen} />
    </Stack.Navigator>
  );
};

export default PhysiotherapistsStack;