//
//  LocationAppDelegate.h
//  LocationToServer
//
//  Created by Semih Onay
//  Copyright (c) 2016 LocationToServer. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "LocationTracker.h"

@interface LocationAppDelegate : UIResponder <UIApplicationDelegate>

@property (strong, nonatomic) UIWindow *window;
@property LocationTracker * locationTracker;
@property (nonatomic) NSTimer* locationUpdateTimer;

@end
